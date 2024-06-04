<div class="w-full p-4 flex justify-around">
    <div class="flex-1 flex flex-col justify-around">
        <div>
            <h3 class="py-4">Password:</h3>
            <x-input-pass placeholder="Contraseña de usuario" id="pass_user_new" width="300px" />
        </div>
        <div>
            <h3 class="py-4">Email de usuario:</h3>
            <x-input-email placeholder="Correo de usuario" id="email_user_new" width="300px" />
        </div>
        <div>
            <h3 class="py-4">Nombre completo:</h3>
            <x-input-text placeholder="Nombre completo" id="names_user_new"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Carnet de identidad:</h3>
            <x-input-text placeholder="Carnet de identidad" id="ci_user_new"  width="300px"/>
        </div>
    </div>
    <div class="flex-1 flex flex-col justify-around">
        <div>
            <h3 class="py-4">Apellido paterno:</h3>
            <x-input-text placeholder="Apellido paterno" id="ap_fa_user_new"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Apellido materno:</h3>
            <x-input-text placeholder="Apellido materno" id="ap_ma_user_new"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Edad:</h3>
            <x-input-text placeholder="Edad" id="age_user_new"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Rol:</h3>
            <select id="optionsRol" style="width: 300px; padding: 10px" class="rounded-lg text-black"></select>
        </div>
    </div>
</div>


<script>
    async function CreateAdmin()
    {
        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo crear al administrador");
        axiosInstance.setMessageSuccess("Se creo el administrador");

        const email = document.getElementById("email_user_new").value;
        const firstName = document.getElementById("names_user_new").value;
        const ci = document.getElementById("ci_user_new").value;
        const dadLastName = document.getElementById("ap_fa_user_new").value;
        const momLastName = document.getElementById("ap_ma_user_new").value;
        const age = document.getElementById("age_user_new").value;
        const pass = document.getElementById("pass_user_new").value;
        const rol = document.getElementById("optionsRol").value;

        await axiosInstance.post(`/admin-general/admin`, {
            firstName, email, ci, dadLastName, momLastName, age, pass, rol
        });
    }
</script>
