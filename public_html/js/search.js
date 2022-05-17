function searchTable() {
    // Declare variables
    var input, select, filter, table, value, tr, td, i, txtValue;
    input = document.getElementById("inputSearch");
    select = document.getElementById("typeSearch");
    value = select.options[select.selectedIndex].value;
    filter = input.value.toUpperCase();
    table = document.getElementById("table-cad");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[value];

        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}