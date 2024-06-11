<div class="w-full p-4 flex justify-around">
    <div class="flex-1 flex flex-col justify-around">
        <div>
            <h3 class="py-4">Email de usuario:</h3>
            <x-input-email placeholder="Correo de usuario" id="email_user" width="300px" />
        </div>
        <div>
            <h3 class="py-4">Nombre completo:</h3>
            <x-input-text placeholder="Nombre completo" id="names_user"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Carnet de identidad:</h3>
            <x-input-text placeholder="Carnet de identidad" id="ci_user"  width="300px"/>
        </div>
    </div>
    <div class="flex-1 flex flex-col justify-around">
        <div>
            <h3 class="py-4">Apellido paterno:</h3>
            <x-input-text placeholder="Apellido paterno" id="ap_fa_user"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Apellido materno:</h3>
            <x-input-text placeholder="Apellido materno" id="ap_ma_user"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Edad:</h3>
            <x-input-text placeholder="Edad" id="age_user"  width="300px"/>
        </div>
    </div>
</div>


<script>
    async function UpdateUser()
    {
        const idUser = localStorage.getItem("idUserSystem");
        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo actualzar el usuario");
        axiosInstance.setMessageSuccess("Se actualizo correctamente");

        const email = document.getElementById("email_user").value;
        const firstName = document.getElementById("names_user").value;
        const ci = document.getElementById("ci_user").value;
        const dadLastName = document.getElementById("ap_fa_user").value;
        const momLastName = document.getElementById("ap_ma_user").value;
        const age = document.getElementById("age_user").value;

        await axiosInstance.put(`/admin-general/user-info?idUser=${idUser}`, {
            firstName, email, ci, dadLastName, momLastName, age
        });
        location.reload();
    }
</script>
