(function () {

    FTX.Offers = {

        list: {

            selectors: {
                offers_table: $('#offers-table'),
            },

            init: function () {
                this.selectors.offers_table.dataTable({

                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.offers_table.data('ajax_url'),
                        type: 'post',
                        data: { status: 1, trashed: false }
                    },
                    columns: [

                        { data: 'request_id', name: 'request_id' },
                        { data: 'request_to', name: 'request_to' },
                        { data: 'offer_by', name: 'offer_by' },
                        { data: 'price', name: 'price' },
                        { data: 'fee', name: 'fee' },
                        { data: 'created_at', name: 'created_at' },
                        // { data: 'actions', name: 'actions', searchable: false, sortable: false }

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