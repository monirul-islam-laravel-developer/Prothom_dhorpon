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
<!-- Summernote CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<style>
    /* Editor container responsive */
    .note-editor {
        width: 100% !important;
        max-width: 100% !important;
        overflow-x: auto;
    }

    /* Editor editable area responsive */
    .note-editable {
        min-height: 150px;
        word-wrap: break-word;
    }

    /* Images inside editor responsive */
    .note-editable img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* Optional: Toolbar wrap on small screens */
    @media (max-width: 768px) {
        .note-toolbar {
            overflow-x: auto;
            white-space: nowrap;
        }
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

