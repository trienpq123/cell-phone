table.clear().draw();
                        table.rows.add(data_domain); // Add new data
                        table.columns.adjust().draw(); 
                        b = JSON.parse(b);
                        if (b.active == 1 && b.error == 0) {
                            // transfer_btn(b.active, _this)
                        } else if (b.active == 0 && b.error == 0) {
                            // transfer_btn(b.active, _this)
                        } else {
                            alert('ERROR update_ajax_locc');
                        }
let data_domain = <?= json_encode($arr_domain) ?>;
let table = $('#dataTable').DataTable({
                data: data_domain,
                columnDefs: [{
                        targets: [1],
                        className: "link_phongkham",
                        render: function(data, type, row, meta) {
                            data = '<a target="_blank" href="https://' + data + '">' + data + '</a>';
                            return data;
                        }
                    },
                    {
                        targets: 2,
                        data: null,
                        width: "100px",
                        // defaultContent: '<button class="btn btn-danger btn_lock">Lock</button>',
                        render: function(data, type, row, meta) {
                            if (data[2] == 1) {
                                return `<button data-id="${data[0]}" data-action="unlock" data-domain="${data[1]}" class="btn d-block m-auto btn-success btn_lock">Unlock</button> `;
                            } else {
                                return `<button data-id="${data[0]}" data-action="lock"  data-domain="${data[1]}" class="btn d-block m-auto btn-danger btn_lock">Lock</button>`;
                            }
                        }
                    },
                    {
                        targets: 3,
                        data: null,
                        width: "100px",
                        // defaultContent: '<button class="btn btn-danger btn_lock">Lock</button>',
                        render: function(data, type, row, meta) {
                            if (data[3] == 1) {
                                return `<button data-id="${data[0]}" data-action="unlockindex" data-domain="${data[1]}" class="btn d-block m-auto btn-success btn_lock">Unlock inx</button>`;
                            } else {
                                return `<button data-id="${data[0]}" data-action="lockindex"  data-domain="${data[1]}" class="btn d-block m-auto btn-danger btn_lock">Lock inx</button>`;
                            }
                        }
                    },
                    {
                        targets: 4,
                        data: null,
                        width: "100px",
                        render: function(data, type, row, meta) {
                            return `<a href="add-${data[0]}" class="btn d-block m-auto btn-info">
                                        Detail
                                    </a>`;
                        }
                    },
                    {
                        targets: 5,
                        data: null,
                        width: "50px",
                        render: function(data, type, row, meta) {
                            return `<p class="text-center m-0">${data[4]}</p>`;
                        }
                    },
                ],
                responsive: true,
                searching: true,
                paging: true,