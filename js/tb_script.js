const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';

     
    });
}



// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}





        ///////////////// pagination ///////////////////////////

        const itemsPerPage = 9;
        const tableRows = document.querySelectorAll('tbody tr');
        const totalPages = Math.ceil(tableRows.length / itemsPerPage);
        let currentPage = 1;

        function paginateTable(currentPage) {
            tableRows.forEach((row, i) => {
                row.classList.toggle('hide', i < (currentPage - 1) * itemsPerPage || i >= currentPage * itemsPerPage);
                row.style.setProperty('--delay', (i % itemsPerPage) / 25 + 's');
            });
        }

        function displayPagination(totalPages, currentPage) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            const createPaginationButton = (pageNumber) => {
                const btn = document.createElement('strong');
                btn.textContent = pageNumber;
                btn.classList.add('pagination-btn');

                btn.addEventListener('click', () => {
                    paginateTable(pageNumber);
                    displayPagination(totalPages, pageNumber);
                });

                if (pageNumber === currentPage) {
                    btn.classList.add('active'); 
                }

                pagination.appendChild(btn);
            };

            // Add "Previous" button
            createPaginationButton('Prev');

            // Add numbered buttons
            for (let i = 1; i <= totalPages; i++) {
                createPaginationButton(i);
            }

            // Add "Next" button
            createPaginationButton('Next');

            // Event listener for "Previous" button
            pagination.querySelector('strong:first-child').addEventListener('click', () => {
                updatePage('prev');
            });

            // Event listener for "Next" button
            pagination.querySelector('strong:last-child').addEventListener('click', () => {
                updatePage('next');
            });
        }

        function updatePage(direction) {
            if (direction === 'next' && currentPage < totalPages) {
                currentPage++;
            } else if (direction === 'prev' && currentPage > 1) {
                currentPage--;
            }

            paginateTable(currentPage);
            displayPagination(totalPages, currentPage);
        }

        const initialPage = 1;
        paginateTable(initialPage);
        displayPagination(totalPages, initialPage);
        ///////////////// pagination ///////////////////////////