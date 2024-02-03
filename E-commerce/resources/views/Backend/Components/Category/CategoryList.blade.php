<div data-bs-theme="dark" style="margin-top: 20px">
  <div style="text-align: right">
      <button class="button" style="padding: 10px 20px;margin-bottom:20px" onclick="createCategoryPopUp()">Add new category</button>
  </div>
  <table id="table">
      <thead>
          <tr>
              <th>Sl no</th>
              <th>Category name</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody id="tableData">
          {{-- <tr>
              <td>1</td>
              <td>shovon</td>
              <td>
                  <button data-id="${item['id']}" class="edite">Edite</button> <span class="btnDevider">|</span>
                  <button data-id="${item['id']}" class="delete">Delete</button>
              </td>
          </tr> --}}
      </tbody>
  </table>
</div>

<script>
  window.addEventListener('load', () => {
    categoryList();
  });

  async function categoryList() {
    showLoader();
    let response = await axios.get("/admin/category-list");
    hideLoader();

    let table = $("#table");
    let tableData = $("#tableData");

    table.DataTable().destroy();
    tableData.empty();

    response.data.forEach((items,index) => {
      let row = `
        <tr>
          <td>${index +1}</td>
          <td>${items['CategoryName']}</td>
          <td>
              <button data-id="${items['id']}" class="edite">Edite</button> <span class="btnDevider">|</span>
              <button data-id="${items['id']}" class="delete">Delete</button>
          </td>
        </tr>
      `

      tableData.append(row);
    });

    $(".edite").on("click", async function() {
      let id = $(this).data("id");
      await fillCategoryEditForm(id);
      editeCategoryPopUp(id);
    });

    $(".delete").on("click", async function() {
      let id = $(this).data("id");
      deleteCategoryPopUp(id);
    });

    new DataTable('#table',{
        order:[[0,'desc']],
        lengthMenu:[3,5,10,15,20,30]
    });
  }
</script>