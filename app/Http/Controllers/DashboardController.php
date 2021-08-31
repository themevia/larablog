<?php

namespace App\Http\Controllers;

use App\Models\Category, App\Models\Post, App\Models\Reaction, App\Models\Reply,
    App\Models\Statistic, App\Models\User, Carbon\Carbon,
    Illuminate\Foundation\Auth\Access\AuthorizesRequests,
    Illuminate\Foundation\Bus\DispatchesJobs, Illuminate\Foundation\Validation\ValidatesRequests,
    Illuminate\Http\Request, Illuminate\Routing\Controller as BaseController,
    Illuminate\Support\Str, Inertia\Inertia;
use App\Models\PageView;

class DashboardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $statistic = new Statistic();
        $s = $statistic->lastYear();
        $totalVisitors=0;
        foreach ($s as $item) {
            $totalVisitors = $totalVisitors+$item['number_of_visitors'];
        }

        return Inertia::render('Dashboard/index',[
            'totalVisitors' => $totalVisitors,
            'totalMembers' => (new User())->totalUser(),
            'lastWeekMembers' => (new User())->lastWeekTotalUser()
        ]);
    }

    /**
     * Posts
     *
     */
    public function posts()
    {
        $posts = (new Post())->paginate(6)->toArray();
        foreach ($posts['data'] as $key => $item) {
            $author = User::find($item['author_id'])->first();
            $posts['data'][$key]['author'] = $author['name'].' '.$author['surname'];
            $posts['data'][$key]['category'] = (new Category())->find($item['category_id'])->get()->toArray()[0]['title'];
        }
        $interactionPosts = (new Post())->where('created_at','>',Carbon::now()->subMonth())
            ->orderBy('comment_count','desc')->orderBy('like_count','desc')->take(2)->get()->toArray();

        return Inertia::render('Dashboard/Posts',[
            'posts' => $posts,
            'interactionPosts' => $interactionPosts,
            'totalViews' => (new Post())->all()->sum('view_count'),
            'totalLikes' => (new Post())->all()->sum('like_count'),
            'totalComments' => (new Post())->all()->sum('comment_count'),
            'totalPosts' => (new Post())->all()->count(),
            'publishedPosts' => (new Post)->where('status','published')->count()
        ]);
    }
    public function post_show($title)
    {
        $post = (new Post())->where('slug',$title)->get()->toArray();
        if (count($post)) {
            $post = $post[0];
            $post['category'] = (new Category())->find($post['category_id'])->get()->toArray()[0]['title'];
            $likes = (new Reaction())->where('reaction_table','posts')->where('reaction_id',$post['id'])
                ->orderBy('created_at','desc')->where('type',1)->get()->toArray();

            $comments = (new Reply())->where('table_name','posts')->where('table_id',$post['id'])
                ->orderBy('created_at','desc')->get()->toArray();

            $likes = by_month_count($likes);
            $comments = by_month_count($comments);
            return Inertia::render('Dashboard/PostShow',[
                'post' => $post,
                'like_by_month' => $likes,
                'comment_by_month' => $comments
            ]);
        } else {
            return $this->notFound();
        }
    }
    public function post_edit($title)
    {
        $post = (new Post())->where('slug',$title)->get()->toArray();
        if (count($post)) {
            $categories = (new Category())->all()->toArray();
            return Inertia::render('Dashboard/PostEdit',[
                'post' => $post[0],
                'categories' => $categories
            ]);
        } else {
            return $this->notFound();
        }
    }
    public function __post_remove($id,Request $request)
    {
        if ($request->input('forceDelete') === null) {
            (new Post())->find($id)->delete();
        } else {
            (new Post())->withTrashed()->where('id',$id)->forceDelete();
        }
        return back();
    }
    public function __post_restore($id)
    {
        (new Post())->withTrashed()
            ->where('id', $id)
            ->restore();
        return back();
    }
    public function post_create($title = null)
    {
        if (isset($title)) {
            $post = (new Post())->where('slug',$title)->get()->toArray();
            $categories = (new Category())->all()->toArray();
            return Inertia::render('Dashboard/PostCreate', [
                'post' => $post,
                'categories' => $categories
            ]);
        } else {
            $categories = (new Category())->all()->toArray();
            return Inertia::render('Dashboard/PostCreate',[
                'categories' => $categories
            ]);
        }
    }
    public function __post_create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required',
            'scheduled_date' => 'nullable|date'
        ]);
        if ($request->hasFile('image')) {
            $imageName = Str::slug($request->input('title'),'-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }
        Post::create([
            'slug' => Str::slug($request->input('title'),'-'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author_id' => Auth()->id(),
            'cover_photo' => (isset($imageName)) ? $imageName:null,
            'tags' => $request->input('tags'),
            'comments' => $request->input('comments') == 'open',
            'status' => $request->input('status'),
            'scheduled_date' =>$request->input('scheduled_date')
        ]);
        if ($request->input('goToBack')) {
            return redirect()->route('posts');
        } else {
            return back();
        }
    }
    public function post_bin()
    {
        $posts = (new Post())->getTrashedAll();
        return Inertia::render('Dashboard/PostBin',[
            'posts' => $posts
        ]);
    }


    /**
     * Categories
     *
     */
    public function categories()
    {
        $categories = (new Category())->paginate(6)->toArray();
        foreach ($categories['data'] as $key => $item) {
            $author = User::find($item['author_id'])->first();
            $categories['data'][$key]['author'] = $author['name'].' '.$author['surname'];
            $categories['data'][$key]['views'] = (new PageView())->where('area','categories')
                ->where('area_id',$item['id'])->sum('count');
        }
        return Inertia::render('Dashboard/Categories',[
            'categories' => $categories,
        ]);
    }
    public function category_create()
    {
        return Inertia::render('Dashboard/CategoryCreate');
    }
    public function category_edit($id)
    {
        $category = (new Category())->where('id',$id)->get()->toArray();
        if (count($category)) {
            return Inertia::render('Dashboard/CategoryEdit',[
                'category' => $category[0],
            ]);
        } else {
            return $this->notFound();
        }
    }
    public function __category_remove($id)
    {
        (new Category())->find($id)->delete();
        return back();
    }
    public function __category_create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'color' => 'required'
        ]);
        Category::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => Auth()->id(),
            'color' =>$request->input('color')
        ]);
        if ($request->input('goToBack')) {
            return redirect()->route('posts');
        } else {
            return back();
        }
    }

    public function pageBuilder()
    {
        return Inertia::render('Dashboard/PageBuilder',[]);
    }

    public function notFound()
    {
        return Inertia::render('Dashboard/notFound');
    }

}
