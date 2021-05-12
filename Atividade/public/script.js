function loadPhones(client_id) {
  $.get(`http://localhost:3333/phone?client_id=${client_id}`, (phones) => {
    console.log(phones)
    // phones.forEach((phone) => {
    //   table.append(`<tr>
    //   <td>${cliente.id}</td>
    //   <td>${cliente.name}</td>
    //   <td>${cliente.email}</td>
    //   <td class="small">
    //     <button class="btn btn-success" onclick="loadPhones(${cliente.id})">Telefones</button>
    //   </td>
    //   <td class="small">
    //     <button class="btn btn-info" onclick="loadCliente(${cliente.id})">Editar</button>
    //   </td>
    //   <td class="small">
    //     <button class="btn btn-danger" onclick="deleteCliente(${cliente.id})">Excluir</button>
    //   </td>
    // </tr>`);
    // });
  });
}

function loadClientes() {
  const table = $("#table-body");

  table.empty();

  $.get("http://localhost:3333/client", (clientes) => {
    clientes.forEach((cliente) => {
      table.append(`<tr>
      <td>${cliente.id}</td>
      <td>${cliente.name}</td>
      <td>${cliente.email}</td>
      <td class="small">
        <button class="btn btn-success" onclick="loadPhones(${cliente.id})">Telefones</button>
      </td>
      <td class="small">
        <button class="btn btn-info" onclick="loadCliente(${cliente.id})">Editar</button>
      </td>
      <td class="small">
        <button class="btn btn-danger" onclick="deleteCliente(${cliente.id})">Excluir</button>
      </td>
    </tr>`);
    });
  });
}

function loadCliente(id) {
  if (id)
    $.get(`/client/${id}`, (cliente) => {
      $("#id").val(cliente.id);
      $("#name").val(cliente.name);
      $("#email").val(cliente.email);
    });
  else {
    $("#id").val("");
    $("#name").val("");
    $("#email").val("");
  }
}

function storeCliente(id, data) {
  const url = `http://localhost:3333/client${id ? "/" + id : ""}`;

  $("#form-cliente :input").prop("disabled", true);

  $.ajax({
    url,
    type: id ? "PUT" : "POST",
    contentType: "application/json",
    data: JSON.stringify(data),
  })
    .done(() => {
      loadCliente();
      loadClientes();
    })
    .fail((err) => {
      console.log(err);

      alert("Ocorreu um erro ao tentar salvar");
    })
    .always(() => {
      $("#form-cliente :input").prop("disabled", false);
    });
}

function deleteCliente(id) {
  $.ajax({
    url: `http://localhost:3333/client/${id}`,
    type: "DELETE",
  })
    .done(() => {
      loadClientes();
    })
    .fail((err) => {
      console.log(err);

      alert("Ocorreu um erro ao tentar excluir");
    });
}

function onSubmit(ev) {
  ev.preventDefault();

  const id = $("#id").val();
  const name = $("#name").val();
  const email = $("#email").val();

  const data = {
    id,
    name,
    email,
  };

  storeCliente(id, data);
}

$(document).ready(() => {
  loadClientes();
});
