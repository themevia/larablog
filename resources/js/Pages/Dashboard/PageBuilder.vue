<template>
    <div>
        <div id="gjs">
            <h1>Hello World Component!</h1>
        </div>
    </div>
</template>

<script>
import 'grapesjs/dist/css/grapes.min.css'
import grapesjs from 'grapesjs'

export default {
    components: {

    },
    props: {

    },
    mounted() {
        const editor = grapesjs.init({
            height: "100vh",
            container: "#gjs",
            showOffsets: true,
            fromElement: true,
            noticeOnUnload: false,
            storageManager: false,
            selectorManager: {
                componentFirst: true
            },
            plugins: ["grapesjs-component-code-editor", "grapesjs-parser-postcss"],
            pluginsOpts: {
                "grapesjs-component-code-editor": {
                    /* Test here your options  */
                }
            },
            canvas: {
                styles: [
                    '/css/app.css',
                ]
            }
        });
        editor.addComponents('<style>body{background-color:rgb(243, 244, 246)}.gjs-selected {outline-color: rgb(16, 185, 129)!important}</style>')
        const panelManager = editor.Panels;

        const removed = panelManager.removePanel('options');
        var actionPanel = panelManager.addPanel({
            id: 'actionPanel',
            visible  : true,
            buttons  : [
                {
                    className: 'text-gray-600 hover:text-green-500 !text-sm',
                    label: 'Preview',
                    command: 'core:preview',
                },
                {
                    className: '',
                    label: '<select id="gjs-laraAction"><option value="publish">Publish</option><option value="Schedule">Schedule</option><option value="draft">Draft</option></select>',
                }
            ],
        });
    },
}



</script>
