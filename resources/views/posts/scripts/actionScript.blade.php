@push('extraScript')
    {{-- Fungsi dari datatables  --}}
    <script>
        publish()

        function publish() {
            $('#publish-table').DataTable({
                bProcessing : true,
                bServerSide : true,
                ajax: {
                    url     : route('datatables.publish'),
                    type    : 'POST',
                    data    : {
                        _token              : '{{ csrf_token() }}'
                    }
                },
                "columnDefs" : [
                    { className : 'text-center', "targets" : 0, "width" : "5" },
                    { className : 'text-center', "targets" : 3, "width" : "100" }
                ],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false , "width" : "5%"},
                    { data: 'Title', name: 'title' },
                    { data: 'Category', name: 'category' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width" : "20%"}
                ]
            })    
        }

        draft()

        function draft() {
            $('#draft-table').DataTable({
                bProcessing : true,
                bServerSide : true,
                ajax: {
                    url     : route('datatables.draft'),
                    type    : 'POST',
                    data    : {
                        _token              : '{{ csrf_token() }}'
                    }
                },
                "columnDefs" : [
                    { className : 'text-center', "targets" : 0, "width" : "5" },
                    { className : 'text-center', "targets" : 3, "width" : "100" }
                ],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false , "width" : "5%"},
                    { data: 'Title', name: 'title' },
                    { data: 'Category', name: 'category' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width" : "20%"}
                ]
            })    
        }

        thrash()

        function thrash() {
            $('#thrash-table').DataTable({
                bProcessing : true,
                bServerSide : true,
                ajax: {
                    url     : route('datatables.thrash'),
                    type    : 'POST',
                    data    : {
                        _token              : '{{ csrf_token() }}'
                    }
                },
                "columnDefs" : [
                    { className : 'text-center', "targets" : 0, "width" : "5" },
                    { className : 'text-center', "targets" : 3, "width" : "100" }
                ],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false , "width" : "5%"},
                    { data: 'Title', name: 'title' },
                    { data: 'Category', name: 'category' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width" : "20%"}
                ]
            })    
        }
    </script>
    {{-- Fungsi dari aksi form --}}
    <script>

        function reloadTable() {
            $('#publish-table').DataTable().ajax.reload();
            $('#draft-table').DataTable().ajax.reload();
            $('#thrash-table').DataTable().ajax.reload();
        }

        // Reset Form Modal
        function reset() {
            $('input').removeClass('is-invalid')
            $('textarea').removeClass('is-invalid')
            $('.invalid-feedback').empty()

            $('input[name="_method"]').prop('disabled', true)
            $('input[name="id"]').val('')
            $('input[name="title"]').val('')
            $('input[name="category"]').val('')
            $('input[name="status"]').val('')
            $('textarea[name="content"]').val('')
        }

        function tambah() {
            reset()
            $('#articleModal').modal('show')
            $('.modal-title').text('Tambah Article Form')
        }

        // Fungsi publish article
        $('#btn-publish').on('click', function () {
            
            $('input[name="status"]').val('Publish')

            let id      = $('input[name="id"]').val()
            let data    = new FormData($('#articleForm')[0])
            let url
            let message

            if (id == '') {
                url     = route('posts.store')
                message = 'Data berhasil disimpan'
            } else {
                url     = route('posts.update', id)
                message = 'Data berhasil diubah'
            }

            $.ajax({
                url         : url,
                type        : 'POST',
                data        : data,
                processData : false,
                contentType : false,
                beforeSend  : function (response) {
                    $('#btn-publish').html('<span class="text-white"> Mohon Menunggu</span>')
                    $('#btn-publish').prop('disabled', true)
                },
                error       : function (response) {
                    $('#btn-publish').html('<span class="fa fa-pencil text-white"> Publish</span>')
                    $('#btn-publish').prop('disabled', false)

                    let code    = response.status
                    let error   = response.responseJSON.errors

                    if(code == 422){
                        $('input').removeClass('is-invalid')
                        $('textarea').removeClass('is-invalid')
                        $('.invalid-feedback').empty()

                        for(const [key, value] of Object.entries(error)){
                            $('input[name="'+key+'"]').addClass('is-invalid')
                            $('textarea[name="'+key+'"]').addClass('is-invalid')
                            $('#'+key).append(value)
                        }
                    }else{
                        Swal.fire({
                            icon    : 'error',
                            title   : 'Gagal',
                            text    : 'Terjadi masalah pada server.',
                            padding : '2em',
                            timer   : 2000
                        })
                    }
                },
                success     : function (response) {
                    $('#btn-publish').html('<span class="fa fa-pencil text-white"> Publish</span>')
                    $('#btn-publish').prop('disabled', false)
                    $('#articleModal').modal('hide')

                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        text    : message,
                        padding : '2em',
                        timer   : 2000
                    }).then(reloadTable())
                    
                }
            })
        })

        // Fungsi publish article
        $('#btn-draft').on('click', function () {
            
            $('input[name="status"]').val('Draft')

            let id      = $('input[name="id"]').val()
            let data    = new FormData($('#articleForm')[0])
            let url
            let message

            if (id == '') {
                url     = route('posts.store')
                message = 'Data berhasil disimpan'
            } else {
                url     = route('posts.update', id)
                message = 'Data berhasil diubah'
            }

            $.ajax({
                url         : url,
                type        : 'POST',
                data        : data,
                processData : false,
                contentType : false,
                beforeSend  : function (response) {
                    $('#btn-draft').html('<span class="text-white"> Mohon Menunggu</span>')
                    $('#btn-draft').prop('disabled', true)
                },
                error       : function (response) {
                    $('#btn-draft').html('<span class="fa fa-book text-white"> Draft</span>')
                    $('#btn-draft').prop('disabled', false)

                    let code    = response.status
                    let error   = response.responseJSON.errors

                    if(code == 422){
                        $('input').removeClass('is-invalid')
                        $('textarea').removeClass('is-invalid')
                        $('.invalid-feedback').empty()

                        for(const [key, value] of Object.entries(error)){
                            $('input[name="'+key+'"]').addClass('is-invalid')
                            $('textarea[name="'+key+'"]').addClass('is-invalid')
                            $('#'+key).append(value)
                        }
                    }else{
                        Swal.fire({
                            icon    : 'error',
                            title   : 'Gagal',
                            text    : 'Terjadi masalah pada server.',
                            padding : '2em',
                            timer   : 2000
                        })
                    }
                },
                success     : function (response) {
                    $('#btn-draft').html('<span class="fa fa-book text-white"> Draft</span>')
                    $('#btn-draft').prop('disabled', false)
                    $('#articleModal').modal('hide')

                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        text    : message,
                        padding : '2em',
                        timer   : 2000
                    }).then(reloadTable())
                }
            })
        })

        // Fungsi edit article
        function edit(id) {
            $('input').removeClass('is-invalid')
            $('textarea').removeClass('is-invalid')
            $('.invalid-feedback').empty()
            
            $('#articleModal').modal('show')
            $('.modal-title').text('Edit Article Form')

            $.ajax({
                url         : route('posts.edit', id),
                type        : 'GET',
                dataType    : 'JSON',
                error       : function (response) {
                    let code    = response.code
                    let message = response.message

                    if(code == 500){
                        Swal.fire({
                            icon    : 'error',
                            title   : 'Gagal',
                            text    : 'Terjadi masalah pada server.',
                            padding : '2em',
                            timer   : 2000
                        })
                    }
                },
                success     : function (response) {
                    $('input[name="_method"]').prop('disabled', false)
                    $('input[name="id"]').val(response.article.id)
                    $('input[name="title"]').val(response.article.title)
                    $('input[name="category"]').val(response.article.category)
                    $('textarea[name="content"]').val(response.article.content)
                }
            })
        }

        // Fungsi Hapus Article
        function hapus(id) {
            Swal.fire({
                icon        : 'warning',
                title       : 'Apakah anda yakin akan dihapus?',
                text        : "Jika sudah terhapus, Data tidak dapat dikembalikan!",
                showCancelButton: true,
                confirmButtonText: `Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url         : route('posts.destroy', id) ,
                        type        : 'POST',
                        data        : {
                            _token  : '{{ csrf_token() }}',
                            _method : 'DELETE'
                        },
                        error       : function(response){
                            Swal.fire({
                                icon    : 'error',
                                title   : 'Gagal',
                                text    : 'Terjadi masalah pada server.',
                                padding : '2em',
                                timer   : 2000
                            })
                        },
                        success     : function (response) {
                            Swal.fire({
                                icon    : 'success',
                                title   : 'Berhasil',
                                text    : 'Data sudah terhapus',
                                padding : '2em',
                                timer   : 2000,
                            }).then(reloadTable())
                        }
                    })
                }
            })
        }
    </script>
@endpush