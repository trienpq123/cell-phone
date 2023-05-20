@extends('admin.index')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection
@section('articles')
    <div class="wraper-container">
        <div class="action btn">
            <div class="btn-add btn">Thêm menu</div>
        </div>
        <br>
        <div id="nested" class="row">
            <div id="nestedDemo" class="list-group col nested-sortable">
                <div data-sortable-id="1.1" class="list-group-item nested-1">Item 1.1
                    <div class="list-group nested-sortable">
                        <div data-sortable-id="2.1" class="list-group-item nested-2">Item 2.1</div>
                        <div data-sortable-id="2.2" class="list-group-item nested-2">
                            Item 2.2
                            <div class="list-group nested-sortable">
                                <div data-sortable-id="3.1" class="list-group-item nested-3">Item 3.1</div>
                                <div data-sortable-id="3.2" class="list-group-item nested-3">Item 3.2</div>
                                <div data-sortable-id="3.3" class="list-group-item nested-3">Item 3.3</div>
                                <div data-sortable-id="3.4" class="list-group-item nested-3">Item 3.4</div>
                            </div>
                        </div>
                        <div data-sortable-id="2.3" class="list-group-item nested-2">Item 2.3</div>
                        <div data-sortable-id="2.4" class="list-group-item nested-2">Item 2.4</div>
                    </div>
                </div>
                <div data-sortable-id="1.2" class="list-group-item nested-1">Item 1.2</div>
                <div data-sortable-id="1.3" class="list-group-item nested-1">Item 1.3</div>
                <div data-sortable-id="1.4" class="list-group-item nested-1">Item 1.4
                    <div class="list-group nested-sortable">
                        <div data-sortable-id="2.1" class="list-group-item nested-2">Item 2.1</div>
                        <div data-sortable-id="2.2" class="list-group-item nested-2">Item 2.2</div>
                        <div data-sortable-id="2.3" class="list-group-item nested-2">Item 2.3</div>
                        <div data-sortable-id="2.4" class="list-group-item nested-2">Item 2.4</div>
                    </div>
                </div>
                <div data-sortable-id="1.5" class="list-group-item nested-1">Item 1.5</div>
            </div>
            <div style="padding: 0" class="col-12">
                <button class="btn-test">test</button>
            </div>
        </div>
    </div>
@endsection

@push('script-action')
    <script src="https://sortablejs.github.io/Sortable/Sortable.js"></script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Nested demo
        var nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

        // Loop through each nested sortable element
        for (var i = 0; i < nestedSortables.length; i++) {
            new Sortable(nestedSortables[i], {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65
            });
        }



        const nestedQuery = '.nested-sortable';
        const identifier = 'sortableId';
        const root = document.getElementById('nestedDemo');

        function serialize(sortable) {
            var serialized = [];
            var children = [].slice.call(sortable.children);
            for (var i in children) {
                var nested = children[i].querySelector(nestedQuery);
                serialized.push({
                    id: children[i].dataset[identifier],
                    children: nested ? serialize(nested) : []
                });
            }
            return serialized
        }


        $(document).ready(function(){
            $('.btn-test').click(function(){
                console.log(serialize(root))
            })
        })

    </script>
@endpush
