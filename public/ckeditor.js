/* ===========================================================
   CKEditor 5 – Custom Build (Khusus untuk modul berita)
   Plugin: Heading, Bold, Italic, Underline, Alignment,
           BlockQuote, Link, List, Undo/Redo
   Tanpa upload gambar
   =========================================================== */

ClassicEditor = (() => {
    const ClassicEditorBase = window.ClassicEditorBase || ClassicEditor;

    const {
        Heading, Bold, Italic, Underline, Alignment, BlockQuote,
        Link, List, Paragraph, Essentials
    } = window;

    class CustomEditor extends ClassicEditorBase {}

    CustomEditor.builtinPlugins = [
        Essentials,
        Paragraph,
        Heading,
        Bold,
        Italic,
        Underline,
        Alignment,
        List,
        BlockQuote,
        Link
    ];

    CustomEditor.defaultConfig = {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'underline',
                '|',
                'alignment:left',
                'alignment:center',
                'alignment:right',
                'alignment:justify',
                '|',
                'bulletedList',
                'numberedList',
                'blockQuote',
                'link',
                '|',
                'undo',
                'redo'
            ]
        },
        alignment: {
            options: ['left', 'center', 'right', 'justify']
        },
        language: 'en'
    };

    return CustomEditor;
})();
