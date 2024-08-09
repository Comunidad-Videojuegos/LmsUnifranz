<div class="w-full p-4 flex justify-around">
    <div class="flex-1 flex flex-col justify-around items-center">
        <div>
            <h3 class="py-4">Nombre de Curso:</h3>
            <x-input-text placeholder="Correo de usuario" id="name_cur" width="300px" />
        </div>
        <div>
            <h3 class="py-4">Descripcion:</h3>
            <x-input-text placeholder="Carnet de identidad" id="desc_cur"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Iniciales del curso:</h3>
            <x-input-text placeholder="Nombre completo" id="ini_cur"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Docente:</h3>
            <select name="" id="ins_cur" class="w-[300px] p-2 outline-none rounded-lg outline-blue-400 text-black">
            </select>
        </div>

    </div>
    <div class="flex-1 flex flex-col justify-around items-left">
        <div class="left">
            <h3 class="py-4">¿Es obligatorio?:</h3>
            <input type="checkbox" class="p-4 w-[20px] h-[20px] scale-150" id="man_cur">
        </div>
        <div>
            <h3 class="py-4">Link del grupo del curso:</h3>
            <x-input-text placeholder="Carnet de identidad" id="lin_cur"  width="300px"/>
        </div>
        <div>
            <h3 class="py-4">Imagen:</h3>
            <x-input-file id="img_cur"  width="300px" accept="image/*"/>
        </div>
    </div>
</div>


<script>
    async function UpdateCourse()
    {
        const idCourse = localStorage.getItem("idCourseSystem");
        const axiosInstance = new AxiosInstance();

        axiosInstance.setMessageError("No se pudo actualzar la carrera");
        axiosInstance.setMessageSuccess("Se actualizo correctamente");

        const formData = new FormData();

        formData.append("name", document.getElementById("name_cur").value);
        formData.append("description", document.getElementById("desc_cur").value);
        formData.append("initials", document.getElementById("ini_cur").value);
        formData.append("instructorId", document.getElementById("ins_cur").value);
        formData.append("mandatory", document.getElementById("man_cur").checked);
        formData.append("groupLink", document.getElementById("lin_cur").value);

        const imageInput = document.getElementById("img_cur");
        if (imageInput.files.length > 0) {
            formData.append("image", imageInput.files[0]);
        }

        await axiosInstance.postFormData(`/content/course?id=${idCourse}`, formData);
        location.reload();
    }
</script>
