(function () {

    FTX.Posts = {

        list: {

            selectors: {
                posts_table: $('#posts-table'),
            },

            init: function () {
                this.selectors.posts_table.dataTable({

                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.posts_table.data('ajax_url'),
                        type: 'post',
                        data: { status: 1, trashed: false }
                    },
                    columns: [

                        { data: 'title', name: 'title' },
                        { data: 'created_by', name: 'created_by' },
                        { data: 'receiver_id', name: 'receiver_id' },
                        { data: 'offers', name: 'offers' },
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