<div>
    <div id="show-roles">
    </div>
</div>

<script>
    async function UpdateRoles()
    {
        const idUser = localStorage.getItem("idUserSystem");
        const inputs = document.querySelectorAll("#show-roles input[type='checkbox']")
        const selectedRoles = {}
        inputs.forEach(element => {
            selectedRoles[element.id] = element.checked
        });

        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo actualzar los roles del usuario");
        axiosInstance.setMessageSuccess("Se modifico correctamente los roles");

        await axiosInstance.put(`/admin-general/roles/admin?idUser=${idUser}`, { roles: selectedRoles });
        location.reload();
    }
</script>
