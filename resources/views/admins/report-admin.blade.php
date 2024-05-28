


<div class="flex justify-around flex-col">
    <div class="py-6">
        <x-type-file />
    </div>

    <div class="flex justify-around">
        <div>
            <h2 class="py-2 font-bold">Ingresa la fecha inicial</h2>
            <x-input-date id="InitDate"/>
        </div>
        <div>
            <h2 class="py-2 font-bold">Ingresa la fecha final</h2>
            <x-input-date id="EndDate"/>
        </div>
    </div>
</div>


<script>
    function GenerateReportAdmin()
    {
        const type = document.getElementById("selectedTypeFile").value;
        const initDate = document.getElementById("InitDate").value;
        const endDate = document.getElementById("EndDate").value;

        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo generar el reporte");
        axiosInstance.setMessageSuccess("El reporte se genero con exito");

        axiosInstance.get(`/report/general/students/for-career/grafic?type=${type}&initDate=${initDate}&endDate=${endDate}`)
        .then(response => {
            if(type == "pdf")
                window.open(response.data, '_blank')
            else
                window.open(response.data)
        })
        .catch(error => {
            console.error(error);
        });

    }
</script>
