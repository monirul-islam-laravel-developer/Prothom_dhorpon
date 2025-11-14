<!-- BOOTSTRAP CSS -->
<link id="style" href="{{asset('/')}}admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="{{asset('/')}}admin/assets/css/style.css" rel="stylesheet" />
<link href="{{asset('/')}}admin/assets/css/skin-modes.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">




<!--- FONT-ICONS CSS -->
<link href="{{asset('/')}}admin/assets/plugins/icons/icons.css" rel="stylesheet" />

<!-- INTERNAL Switcher css -->
<link href="{{asset('/')}}admin/assets/switcher/css/switcher.css" rel="stylesheet">
<link href="{{asset('/')}}admin/assets/switcher/demo.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250,      // optional default height
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
<style>
    /* 🔵 Tag Input Container */
    #tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        padding: 6px;
        min-height: 45px;
        border: 1px solid #d0d0d0;
        border-radius: 6px;
        cursor: text;
    }

    /* 🔵 Input Area inside tag container */
    #tag-container input {
        border: none;
        outline: none;
        flex: 1;
        min-width: 120px;
        padding: 6px;
        font-size: 14px;
    }

    /* 🔵 Single Tag Style */
    .tag {
        background: #eaf3ff;
        color: #0057c2;
        padding: 4px 10px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        font-size: 14px;
        font-weight: 500;
        border: 1px solid #d0e4ff;
    }

    /* 🔴 Remove Button */
    .tag .remove {
        margin-left: 8px;
        cursor: pointer;
        font-weight: bold;
        color: #c20000;
    }

    .tag .remove:hover {
        color: #ff1a1a;
    }

    /* 🔵 Summernote small style improvement */
    .note-editor.note-frame {
        border-radius: 6px !important;
        border-color: #ccc !important;
    }

    .note-toolbar {
        background: #f9f9f9 !important;
        border-bottom: 1px solid #ccc !important;
    }

    .note-statusbar {
        background: #fafafa !important;
        border-top: 1px solid #ddd !important;
    }
</style>


<style>
    #tag-container {
        display: flex;
        flex-wrap: wrap;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .tag {
        background-color: #e2e2e2;
        border-radius: 3px;
        padding: 5px 10px;
        margin: 3px;
        display: flex;
        align-items: center;
    }

    .tag .remove {
        margin-left: 8px;
        color: #555;
        cursor: pointer;
        font-weight: bold;
    }

    #tag-input {
        border: none;
        outline: none;
        flex: 1;
        padding: 5px;
    }
</style>
<style>
    #preview {
        max-width: 100%;
        max-height: 300px;
        margin-top: 10px;
        display: none;
        border: 1px solid #ccc;
        padding: 5px;
    }
</style>

