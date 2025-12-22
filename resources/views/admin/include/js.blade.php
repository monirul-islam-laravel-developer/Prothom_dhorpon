<!-- JQUERY JS -->
<script src="{{asset('/')}}admin/assets/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="{{asset('/')}}admin/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/pscroll.js"></script>

<!-- STICKY JS -->
<script src="{{asset('/')}}admin/assets/js/sticky.js"></script>


<!-- APEXCHART JS -->
<script src="{{asset('/')}}admin/assets/js/apexcharts.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('/')}}admin/assets/plugins/select2/select2.full.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('/')}}admin/assets/plugins/circle-progress/circle-progress.min.js"></script>

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!-- INDEX JS -->
<script src="{{asset('/')}}admin/assets/js/index1.js"></script>
<script src="{{asset('/')}}admin/assets/js/index.js"></script>

<!-- Reply JS-->
<script src="{{asset('/')}}admin/assets/js/reply.js"></script>


<!-- COLOR THEME JS -->
<script src="{{asset('/')}}admin/assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/')}}admin/assets/js/custom.js"></script>

<!-- SWITCHER JS -->
<script src="{{asset('/')}}admin/assets/switcher/js/switcher.js"></script>

<!-- DATA TABLE JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>


<!-- TABLE EDITS JS-->
<script src="{{asset('/')}}admin/assets/plugins/jQuery-table-edits/table-edits.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/jQuery-table-edits/table-edits.js"></script>

<!-- INTERNAL DATATABLES JS -->
<script src="{{asset('/')}}admin/assets/js/table-editable.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'এখানে লিখুন...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontsize', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'fullscreen']]
            ]
        });
    });
</script>

<!-- seo tag input add blade JS -->
<script>
    const input = document.getElementById('tag-input');
    const container = document.getElementById('tag-container');
    const hiddenInput = document.getElementById('seo-tags-hidden');

    const tags = [];

    function updateHiddenInput() {
        hiddenInput.value = tags.join(',');
    }

    function createTagElement(text) {
        const tag = document.createElement('div');
        tag.className = 'tag';
        tag.textContent = text;

        const remove = document.createElement('span');
        remove.className = 'remove';
        remove.textContent = '×';
        remove.onclick = () => {
            const index = tags.indexOf(text);
            if (index > -1) {
                tags.splice(index, 1);
                updateHiddenInput();
            }
            tag.remove();
        };

        tag.appendChild(remove);
        return tag;
    }

    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === ',') {
            event.preventDefault();
            const text = input.value.trim();
            if (text && !tags.includes(text)) {
                tags.push(text);
                const tag = createTagElement(text);
                container.insertBefore(tag, input);
                input.value = '';
                updateHiddenInput();
            }
        }
    });
</script>


<!-- end seo tag input JS -->


