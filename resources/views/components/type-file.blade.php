
{{-- <select name="" id="typeFile" class="py-2 px-2 w-4/6 text-center text-black outline-none border-none">
    <option value="pdf" class="text-red-500 font-semibold">PDF</option>
    <option value="xlsx" class="text-green-500 font-semibold">XLSX</option>
    <option value="csv" class="text-green-700 font-semibold">CSV</option>
    <option value="rtf" class="text-gray-500 font-semibold">RTF</option>
    <option value="docx" class="text-blue-500 font-semibold">DOCX</option>
    <option value="odt" class="text-blue-800 font-semibold">ODT</option>
    <option value="ods" class="text-orange-800 font-semibold">ODS</option>
    <option value="pptx" class="text-orange-700 font-semibold">PPTX</option>
</select> --}}

<style>
    .custom-select-container {
        position: relative;
        display: inline-block;
        width: 100%;
        cursor: pointer;
    }

    .custom-select-trigger {
        padding: 12px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .custom-options {
        position: absolute;
        display: none;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
        z-index: 999;
        box-shadow: 0 6px 12px rgba(0,0,0,0.175);
    }

    .custom-option {
        padding: 10px;
        cursor: pointer;
    }

    .custom-option:hover {
        font-size: 15px;
        opacity: 0.5;
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="custom-select-container py-2 px-2 w-4/6 text-center text-black outline-none border-none">
    <div class="custom-select-trigger">Seleccione el formato</div>
    <div class="custom-options">
        <span class="custom-option text-red-500 font-semibold" data-value="pdf">
            <i class="bi bi-file-pdf-fill"></i>PDF
        </span>
        <span class="custom-option text-green-500 font-semibold" data-value="xlsx">
            <i class="bi bi-file-earmark-spreadsheet-fill"></i>XLSX
        </span>
        <span class="custom-option text-green-700 font-semibold" data-value="csv">
            <i class="bi bi-filetype-csv"></i>CSV
        </span>
        <span class="custom-option text-gray-500 font-semibold" data-value="rtf">
            <i class="bi bi-file-code-fill"></i>RTF
        </span>
        <span class="custom-option text-blue-500 font-semibold" data-value="docx">
            <i class="bi bi-file-word-fill"></i>DOCX
        </span>
        <span class="custom-option text-blue-800 font-semibold" data-value="odt">
            <i class="bi bi-file-code-fill"></i>ODT
        </span>
        <span class="custom-option text-orange-800 font-semibold" data-value="ods">
            <i class="bi bi-file-code-fill"></i>ODS
        </span>
        <span class="custom-option text-orange-700 font-semibold" data-value="pptx">
            <i class="bi bi-filetype-pptx"></i>PPTX
        </span>
    </div>
    <input type="hidden" id="selectedTypeFile" name="typeFile">
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectTrigger = document.querySelector('.custom-select-trigger');
        const customOptions = document.querySelector('.custom-options');
        const customOptionsList = document.querySelectorAll('.custom-option');
        const hiddenInput = document.getElementById('selectedTypeFile');

        selectTrigger.addEventListener('click', function() {
            customOptions.style.display = customOptions.style.display === 'block' ? 'none' : 'block';
        });

        customOptionsList.forEach(function(option) {
            option.addEventListener('click', function() {
                selectTrigger.textContent = this.textContent;
                hiddenInput.value = this.getAttribute('data-value');  // Set the value of the hidden input
                customOptions.style.display = 'none';
            });
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.custom-select-container')) {
                customOptions.style.display = 'none';
            }
        });
    });
</script>
