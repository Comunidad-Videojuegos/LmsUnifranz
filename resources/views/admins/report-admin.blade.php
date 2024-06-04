


<div class="flex justify-around">

    <div class="flex justify-around flex-col flex-1 items-center">
        <div>
            <h2 class="py-2 font-bold">Ingresa la fecha inicial</h2>
            <x-input-date id="InitDate"/>
        </div>
        <div>
            <h2 class="py-2 font-bold">Ingresa la fecha final</h2>
            <x-input-date id="EndDate"/>
        </div>
    </div>
    {{-- <div class=" w-32 bg-red-900">

    </div> --}}
</div>

<script>
    async function GenerateReportPreview()
    {
        const initDate = document.getElementById("InitDate").value;
        const endDate = document.getElementById("EndDate").value;

        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo generar el reporte");
        axiosInstance.setMessageSuccess("El reporte se genero con exito");

        await axiosInstance.getReport(`/report/general/students/for-career?type=pdf&initDate=${initDate}&endDate=${endDate}`);
    }
    async function GenerateReportPreview2()
    {
        const initDate = document.getElementById("InitDate").value;
        const endDate = document.getElementById("EndDate").value;

        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo generar el reporte");
        axiosInstance.setMessageSuccess("El reporte se genero con exito");

        await axiosInstance.getReport(`/report/general/students/for-career/grafic?type=pdf&initDate=${initDate}&endDate=${endDate}`);
    }
</script>
