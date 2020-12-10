<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Home - Api</title>
</head>
<body>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 col-md-offset-2">

        <div class="card">
          <div class="card-body d-flex justify-content-between align-items-center">
            Lista de Mascotas

            <div class="form-group">
              <label for="exampleFormControlSelect1">Filtrar Status</label>
              <select class="form-control" onchange="filtarStatus()" id="status">
                <option value="">Select ...</option>
                <option value="available">available</option>
                <option value="pending">pending</option>
                <option value="sold">sold</option>
              </select>
            </div>

            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#crearModal">Crear Mascotas</button>

          </div>
        </div>

        <div class="card">
          
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Category</th>
              <th scope="col">Name</th>
              <th scope="col">photoUrls</th>
              <th scope="col">Tag</th>
              <th scope="col">Statu</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody id="tbody">
            
          </tbody>
        </table>

      </div>
    </div>
  </div>

  <!-- Modal Crear Categoria -->
  <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Mascota</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formulario">
            <div class="mb-3">
              <label for="Name" class="form-label">Name:</label>
              <input type="text" class="form-control" placeholder="Ejemplo: Perro, Gato" id="name">
            </div>
            <div class="mb-3">
              <label for="Categoria" class="form-label">Category:</label>
              <select id="category" name="category" class="form-control">
                <option value="">Seleccionar ...</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="PhotoUrls" class="form-label">photoUrls:</label>
              <input type="text" class="form-control" placeholder="Ejemplo: https://www.duna.cl/media/2020/10/gatos-900x506.jpg" id="photoUrls">
            </div>
            <div class="mb-3">
              <label for="Tags" class="form-label">Tags:</label>
              <select id="tags" name="tags" class="form-control">
                <option value="">Seleccionar ...</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="Status" class="form-label">Status:</label>
              <select id="statu" name="statu" class="form-control">
                <option value="">Seleccionar ...</option>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="guardarPet()">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Actualizar Categoria -->
  <div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Mascota</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formulario-actualizar">
            <div class="mb-3" style="display: none;">
              <label for="Id" class="form-label">Id:</label>
              <input type="text" class="form-control" placeholder="Ejemplo: Perro, Gato" id="id-update">
            </div>
            <div class="mb-3">
              <label for="Name" class="form-label">Name:</label>
              <input type="text" class="form-control" placeholder="Ejemplo: Perro, Gato" id="name-update">
            </div>
            <div class="mb-3">
              <label for="Categoria" class="form-label">Category:</label>
              <select id="category-update" class="form-control">
                <option value="">Seleccionar ...</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="PhotoUrls" class="form-label">photoUrls:</label>
              <input type="text" class="form-control" placeholder="Ejemplo: https://www.duna.cl/media/2020/10/gatos-900x506.jpg" id="photoUrls-update">
            </div>
            <div class="mb-3">
              <label for="Tags" class="form-label">Tags:</label>
              <select id="tags-update" class="form-control">
                <option value="">Seleccionar ...</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="Status" class="form-label">Status:</label>
              <select id="statu-update" class="form-control">
                <option value="">Seleccionar ...</option>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="actualizarPet()">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>


	<script>

	    //Listar Mascotas
      const listarPet = async() => {
        try {

          const res= await fetch('<?php echo base_url('api/pet')?>')
          const data= await res.json()

          let tabla='';
          let tbody=document.querySelector("#tbody");

          for(let valor of data){
            tabla+=`
            <tr>
              <th scope="row">${valor.id}</th>
              <td>${valor.name_category}</td>
              <td>${valor.name}</td>
              <td><img src="${valor.photoUrls}" alt="imagen-pet" width="60px"></td>
              <td>${valor.name_tag}</td>
              <td>${valor.status}</td>
              <td>
                <button class="btn btn-success btn-sm" onclick="traerPet(${valor.id})" data-bs-toggle="modal" data-bs-target="#actualizarModal">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarPet(${valor.id})">Delete</button>
              </td>
            </tr>
            `;
          }

          tbody.innerHTML=tabla;

        }catch (error) {
          console.log(error);
        }
      }
      listarPet();
      //FIN Listar Mascotas

      //Filtar Status
      const filtarStatus= async() => {
        let status=document.querySelector("#status").value;

        if (status == '') {
          listarPet();
        }else{
          const res= await fetch(`<?php echo base_url('api/pet/findByStatus?status=')?>${status}`)
          const data= await res.json()

          let tabla='';
          let tbody=document.querySelector("#tbody");

          for(let valor of data){
            tabla+=`
            <tr>
              <th scope="row">${valor.id}</th>
              <td>${valor.name_category}</td>
              <td>${valor.name}</td>
              <td><img src="${valor.photoUrls}" alt="imagen-pet" width="60px"></td>
              <td>${valor.name_tag}</td>
              <td>${valor.status}</td>
              <td>
                <button class="btn btn-success btn-sm" onclick="traerPet(${valor.id})"  data-bs-toggle="modal" data-bs-target="#actualizarModal">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarPet(${valor.id})">Delete</button>
              </td>
            </tr>
            `;
          }

          tbody.innerHTML=tabla;
        }
        
      }
      //FIN Filtar Status

      //Eliminar Categoria
      const eliminarPet = async(id) => {
        if (window.confirm("Desea eliminar esta mascota?")) { 

          const res= await fetch(`<?php echo base_url('api/pet')?>/${id}`, {
            method: 'DELETE'
          })
          const data= await res.json()

          if (data.status == true) {
            listarPet()
            alert("Pet Eliminada Correctamente")
          }
        }
      }
      //FIN Eliminar Categoria

      /*listar category y tag en el select*/

      const listarCategory= async() =>{

        const res= await fetch(`<?php echo base_url('api/category/')?>`)
        const data= await res.json()

        let category=document.querySelector('#category');
        let category_update=document.querySelector('#category-update');

        let select='';

        for(let category of data){

          select+=`<option value="${category.id}">${category.name}</option>`;

        }

        category.innerHTML=`<option value="">Seleccionar ...</option>`+select;
        category_update.innerHTML=`<option value="">Seleccionar ...</option>`+select;

      }

      listarCategory()

      const listarTag= async() =>{

        const res= await fetch(`<?php echo base_url('api/tag/')?>`)
        const data= await res.json()

        let tags=document.querySelector('#tags');
        let tags_update=document.querySelector('#tags-update');

        let select='';

        for(let tags of data){

          select+=`<option value="${tags.id}">${tags.name}</option>`;

        }

        tags.innerHTML=`<option value="">Seleccionar ...</option>`+select;
        tags_update.innerHTML=`<option value="">Seleccionar ...</option>`+select;

      }

      listarTag()

      //Guardar Mascota
      const guardarPet= async() => {

        let name= document.querySelector('#name').value;
        let category= document.querySelector('#category').value;
        let photoUrls= document.querySelector('#photoUrls').value;
        let tags= document.querySelector('#tags').value;
        let status= document.querySelector('#statu').value;

        const res= await fetch(`<?php echo base_url('api/pet/')?>`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
              "category": category,
              "name": name,
              "photoUrls": photoUrls,
              "tags": tags,
              "status": status
          })
        })
        const data= await res.json()
        
        if (data.status == true) {
          listarPet()
          alert("Pet Creado Correctamente")
          document.querySelector('#formulario').reset();
        }else if (data.status == false && data.error == true) {
          alert("Todos los Campos son Requeridos")
        }else{
          alert("error del server")
        }
      }
      //FIN guardar Mascota

      //Actualizar Mascota

      /*Traemos la mascota por su id y lo pintamos*/
      const traerPet = async(id) =>{
        
        const res= await fetch(`<?php echo base_url('api/pet/')?>${id}`)
        const data= await res.json()

        document.getElementById("id-update").value = data.id;
        document.getElementById("name-update").value = data.name;
        document.getElementById("photoUrls-update").value = data.photoUrls;
        document.getElementById("statu-update").value = data.status;
        document.getElementById("category-update").value = data.category;
        document.getElementById("tags-update").value = data.tags; 
      }

      /*Actualizamos la Mascota*/
      const actualizarPet = async() =>{

        let id= document.querySelector('#id-update').value;
        let name= document.querySelector('#name-update').value;
        let category= document.querySelector('#category-update').value;
        let photoUrls= document.querySelector('#photoUrls-update').value;
        let tags= document.querySelector('#tags-update').value;
        let status= document.querySelector('#statu-update').value;

        const res= await fetch(`<?php echo base_url('api/pet/')?>${id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
              "category": category,
              "name": name,
              "photoUrls": photoUrls,
              "tags": tags,
              "status": status
          })
        })
        const data= await res.json()
        
        if (data.status == true) {
          listarPet()
          alert("Pet Actualizado Correctamente")
        }else if (data.status == false && data.error == true) {
          alert("Todos los Campos son Requeridos")
        }else{
          alert("error del server")
        }
      }

      //FIN Actualizar Mascota
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>