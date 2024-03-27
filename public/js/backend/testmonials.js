(function () {

    FTX.Testmonials = {

        list: {
        
            selectors: {
                testmonials_table: $('#testmonials-table'),
            },
        
            init: function () {

                this.selectors.testmonials_table.dataTable({

                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.testmonials_table.data('ajax_url'),
                        type: 'post',
                    },
                    columns: [

                        { data: 'testmonial', name: 'testmonial' },
                        { data: 'author', name: 'author' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'actions', name: 'actions', searchable: false, sortable: false }

                    ],
                    order: [[0, "asc"]],
                    searchDelay: 500,
                    "createdRow": function (row, data, dataIndex) {
                        FTX.Utils.dtAnchorToForm(row);
                    }
                });
            }
        },

        edit: {
            init: function (locale) {
                FTX.tinyMCE.init(locale);                
            }
        },
    }
})();