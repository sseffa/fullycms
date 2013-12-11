@extends('backend/_layout/layout')
@section('content')
{{ HTML::style('assets/css/menu-managment.css') }}
{{ HTML::script('assets/js/jquery.nestable.js') }}
<div class="container">
    <h2>Menu Managment</h2>
    <div class="cf nestable-lists">
    <div class="dd" id="nestable">
        <ol class="dd-list">
            <li class="dd-item" data-id="1">
                <div class="dd-handle"></div>
                <div class="dd-content">Home
                    <div class="ns-actions">
                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/') . '/assets/images/edit.png' }}"></a>
                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/') . '/assets/images/cross.png' }}"></a><input type="hidden" value="1" name="menu_id">
                    </div>
                </div>
            </li>
            <li class="dd-item" data-id="2">
                <div class="dd-handle"></div>
                <div class="dd-content">About
                    <div class="ns-actions">
                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                    </div>
                </div>
            </li>
            <li class="dd-item" data-id="3">
                <div class="dd-handle"></div>
                <div class="dd-content">References
                    <div class="ns-actions">
                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                    </div>
                </div>
            </li>
            <li class="dd-item" data-id="4">
                <div class="dd-handle"></div>
                <div class="dd-content">Gallery
                    <div class="ns-actions">
                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                    </div>
                </div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="4-1">
                        <div class="dd-handle"></div>
                        <div class="dd-content">Photo Gallery
                            <div class="ns-actions">
                                <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                            </div>
                        </div>
                        <ol class="dd-list">
                            <li class="dd-item" data-id="4-1-1">
                                <div class="dd-handle"></div>
                                <div class="dd-content">2011 Gallery
                                    <div class="ns-actions">
                                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                                    </div>
                                </div>
                            </li>
                            <li class="dd-item" data-id="4-1-2">
                                <div class="dd-handle"></div>
                                <div class="dd-content">2012 Gallery
                                    <div class="ns-actions">
                                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                                    </div>
                                </div>
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="4-1-2-1">
                                        <div class="dd-handle"></div>
                                        <div class="dd-content">January Gallery
                                            <div class="ns-actions">
                                                <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                                <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="4-1-2-2">
                                        <div class="dd-handle"></div>
                                        <div class="dd-content">March Gallery
                                            <div class="ns-actions">
                                                <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                                <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="4-1-2-3">
                                        <div class="dd-handle"></div>
                                        <div class="dd-content">April Gallery
                                            <div class="ns-actions">
                                                <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                                <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item" data-id="4-1-3">
                                <div class="dd-handle"></div>
                                <div class="dd-content">2013 Gallery
                                    <div class="ns-actions">
                                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </li>
                    <li class="dd-item" data-id="4-2">
                        <div class="dd-handle"></div>
                        <div class="dd-content">Video Gallery
                            <div class="ns-actions">
                                <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                                <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                            </div>
                        </div>
                    </li>
                </ol>
            </li>
            <li class="dd-item" data-id="5">
                <div class="dd-handle"></div>
                <div class="dd-content">Product
                    <div class="ns-actions">
                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                    </div>
                </div>
            </li>
            <li class="dd-item" data-id="6">
                <div class="dd-handle"></div>
                <div class="dd-content">Contact
                    <div class="ns-actions">
                        <a title="Edit Menu" class="edit-menu" href="#"><img alt="Edit" src="{{ url('/'). '/assets/images/edit.png'  }}"></a>
                        <a class="delete-menu" href="#"><img alt="Delete" src="{{ url('/'). '/assets/images/cross.png'  }}"></a><input type="hidden" value="1" name="menu_id">
                    </div>
                </div>
            </li>
        </ol>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        $('#nestable').nestable({
            group: 1
        }).on('change', updateOutput);

        updateOutput($('#nestable').data('output', $('#nestable-output')));

        /*-------------------------------------------------*/

        var el = {
            btnAction: $('#action'),
            btnClear: $('#clear'),
            input: $('#nestable-output'),
            result: $('#result')
        };

        //el.input.val(JSON.stringify(updateOutput,null,4));

        el.btnAction.on('click', function () {
            var json = el.input.val();
            var o;
            try {
                o = JSON.parse(json);
            }
            catch (e) {
                alert('not valid JSON');
                return;
            }

            var node = new PrettyJSON.view.Node({
                el: el.result,
                data: o
            });
        });

        el.btnClear.on('click', function () {
            el.input.val('');
            el.result.html('');
        });
    });
</script>
</div>
@stop