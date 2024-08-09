<div class="w-full p-4 flex justify-around">
    <div class="flex-1 flex flex-col justify-around items-center">
        <div>
            <h3 class="py-4">Nombre de Carrera:</h3>
            <x-input-text placeholder="Correo de usuario" id="name_car" width="300px" />
        </div>
        <div>
            <h3 class="py-4">Iniciales de Carrera:</h3>
            <x-input-text placeholder="Nombre completo" id="ini_car"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Descripción:</h3>
            <x-input-text placeholder="Carnet de identidad" id="desc_car"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Duración:</h3>
            <x-input-text placeholder="Carnet de identidad" id="dur_car"  width="300px"/>
        </div>
    </div>
</div>


<script>
    async function UpdateCareer()
    {
        const idCareer = localStorage.getItem("idCareerSystem");
        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo actualzar la carrera");
        axiosInstance.setMessageSuccess("Se actualizo correctamente");

        const name = document.getElementById("name_car").value;
        const description = document.getElementById("desc_car").value;
        const initials = document.getElementById("ini_car").value;
        const duration = document.getElementById("dur_car").value;

        await axiosInstance.put(`/admin-general/career?id=${idCareer}`, {
            name, description, initials, duration
        });
        location.reload();
    }
</script>
