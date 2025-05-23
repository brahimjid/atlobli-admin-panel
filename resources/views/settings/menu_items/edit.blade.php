@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('lang.menu_items')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{!! route('setting.banners') !!}">{{trans('lang.menu_items')}}</a></li>
                <li class="breadcrumb-item active">{{trans('lang.menu_items_edit')}}</li>
            </ol>
        </div>
    </div>
    <div class="card-body">
        <div class="error_top"></div>
        <div class="row restaurant_payout_create">
            <div class="restaurant_payout_create-inner">
                <fieldset>
                    <legend>{{trans('lang.menu_items')}}</legend>
                    <div class="form-group row width-50">
                        <label class="col-3 control-label">{{trans('lang.title')}}</label>
                        <div class="col-7">
                            <input type="text" class="form-control title">
                        </div>
                    </div>
                    <div class="form-group row width-50">
                        <label class="col-3 control-label">{{trans('lang.set_order')}}</label>
                        <div class="col-7">
                            <input type="number" class="form-control set_order" min="0">
                        </div>
                    </div>
                    <div class="form-group row width-100">
                        <div class="form-check width-100">
                            <input type="checkbox" id="is_publish">
                            <label class="col-3 control-label" for="is_publish">{{trans('lang.is_publish')}}</label>
                        </div>
                    </div>
                    <div class="form-group row width-50">
                        <label class="col-3 control-label">{{trans('lang.photo')}}</label>
                        <input type="file"  onChange="handleFileSelect(event)" class="col-7">
                        <div id="uploding_image"></div>
                        <div class="placeholder_img_thumb user_image"></div>
                    </div>
                    <div class="form-group row width-50" id="banner_position">
                        <label class="col-3 control-label ">{{trans('lang.banner_position')}}</label>
                        <div class="col-7">
                            <select name="position" id="position" class="form-control">
                                <option value="top">{{trans('lang.top')}}</option>
                                <option value="middle">{{trans('lang.middle')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row width-100 radio-form-row d-flex" id="redirect_type_div">
                        <div class="radio-form col-md-2">
                            <input type="radio" class="redirect_type" value="store" name="redirect_type" id="store">
                            <label class="custom-control-label">{{trans('lang.store')}}</label>
                        </div>
                        <div class="radio-form col-md-2">
                            <input type="radio" class="redirect_type" value="product" name="redirect_type" id="product">
                            <label class="custom-control-label">{{trans('lang.product')}}</label>
                        </div>
                        <div class="radio-form col-md-4">
                            <input type="radio" class="redirect_type" value="external_link" name="redirect_type" id="external_links">
                            <label class="custom-control-label">{{trans('lang.external_link')}}</label>
                        </div>
                    </div>
                    <div class="form-group row width-50" id="vendor_div" style="display: none;">
                        <label class="col-3 control-label ">{{trans('lang.store')}}</label>
                        <div class="col-7">
                            <select name="storeId" id="storeId" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row width-50" id="product_div" style="display: none;">
                        <label class="col-3 control-label ">{{trans('lang.product')}}</label>
                        <div class="col-7">
                            <select name="productId" id="productId" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row width-100" id="external_link_div" style="display: none;">
                        <label class="col-3 control-label">{{trans('lang.external_link')}}</label>
                        <div class="col-7">
                            <input type="text" class="form-control extlink" id="external_link">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="form-group col-12 text-center">
        <button type="button" class="btn btn-primary  edit-setting-btn"><i class="fa fa-save"></i> {{trans('lang.save')}}</button>
        <a href="{!! route('setting.banners') !!}" class="btn btn-default"><i class="fa fa-undo"></i>{{trans('lang.cancel')}}</a>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var database = firebase.firestore();
    var photo = "";
    var fileName = "";
    var bannerImageFile = "";
    var placeholderImage = '';
    var placeholder = database.collection('settings').doc('placeHolderImage');
    placeholder.get().then(async function(snapshotsimage) {
        var placeholderImageData = snapshotsimage.data();
        placeholderImage = placeholderImageData.image;
    })
    var storageRef = firebase.storage().ref('images');
    var storage = firebase.storage();
    var id = "<?php echo $id; ?>";
    var ref = database.collection('menu_items').where("id", "==", id);
    $("input[name='redirect_type']:radio").change(function() {
        var redirect_type = $(this).val();
        if (redirect_type == "store") {
            getTypeWiseDetails('store');
            $('#vendor_div').show();
            $('#product_div').hide();
            $('#external_link_div').hide();
        } else if (redirect_type == "product") {
            getTypeWiseDetails('product');
            $('#vendor_div').hide();
            $('#product_div').show();
            $('#external_link_div').hide();
        } else if (redirect_type == "external_link") {
            $('#vendor_div').hide();
            $('#product_div').hide();
            $('#external_link_div').show();
        }
    });
    $(document).ready(function() {
        jQuery("#data-table_processing").show();
        ref.get().then(async function(snapshots) {
            var menuItems = snapshots.docs[0].data();
            $(".title").val(menuItems.title);
            $("#position").val(menuItems.position);
            $(".set_order").val(menuItems.set_order);
            $(".extlink").val(menuItems.redirect_id);
            if (menuItems.is_publish) {
                $("#is_publish").prop("checked", true);
            }
            if (menuItems.photo != '' && menuItems.photo != null) {
                photo = menuItems.photo;
                bannerImageFile = menuItems.photo;
                $(".user_image").append('<img onerror="this.onerror=null;this.src=\'' + placeholderImage + '\'" class="rounded" style="width:50px" src="' + photo + '" alt="image">');
            }
            if (menuItems.hasOwnProperty('redirect_type')) {
                var redirect_type = menuItems.redirect_type;
                var redirect_id = menuItems.redirect_id;
                $("input[name=redirect_type][value=" + redirect_type + "]").attr('checked', 'checked');
                if (redirect_type == "store") {
                    getTypeWiseDetails('store', redirect_id);
                    $('#vendor_div').show();
                    $('#product_div').hide();
                    $('#external_link_div').hide();
                } else if (redirect_type == "product") {
                    getTypeWiseDetails('product', redirect_id);
                    $('#vendor_div').hide();
                    $('#product_div').show();
                    $('#external_link_div').hide();
                } else if (redirect_type == "external_link") {
                    $('#vendor_div').hide();
                    $('#product_div').hide();
                    $('#external_link_div').show();
                }
            }
            jQuery("#data-table_processing").hide();
        });
    });
    function handleFileSelect(evt) {
        var f = evt.target.files[0];
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                var filePayload = e.target.result;
				var val = f.name;
				var ext = val.split('.')[1];
				var docName = val.split('fakepath')[1];
				var filename = (f.name).replace(/C:\\fakepath\\/i, '')
				var timestamp = Number(new Date());
				var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
				photo = filePayload;
				fileName = filename;
                $(".user_image").empty();
                $(".user_image").append('<img class="rounded" style="width:50px" src="' + photo + '" alt="image">');
                $("#banner_img").val('');
            };
        })(f);
        reader.readAsDataURL(f);
    }
    async function storeImageData() {
        var newPhoto = '';
        try {
            if (bannerImageFile != "" && photo != bannerImageFile) {
                var bannerOldImageUrlRef = await storage.refFromURL(bannerImageFile);
                imageBucket = bannerOldImageUrlRef.bucket;
                    var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
                    if (imageBucket == envBucket) {
                        await bannerOldImageUrlRef.delete().then(() => {
                            console.log("Old file deleted!")
                        }).catch((error) => {
                            console.log("ERR File delete ===", error);
                        });
                    } else {
                        console.log('Bucket not matched');
                    }
            }
            if (photo != bannerImageFile) {
                photo = photo.replace(/^data:image\/[a-z]+;base64,/, "")
                var uploadTask = await storageRef.child(fileName).putString(photo, 'base64', {
                    contentType: 'image/jpg'
                });
                var downloadURL = await uploadTask.ref.getDownloadURL();
                newPhoto = downloadURL;
                photo = downloadURL;
            } else {
                newPhoto = photo;
            }
        } catch (error) {
            console.log("ERR ===", error);
        }
        return newPhoto;
    }
    $(".edit-setting-btn").click(function() {
        var title = $(".title").val();
        var position = $("#position").val();
        var set_order = parseInt($('.set_order').val());
        var is_publish = false;
        var redirect_type = "";
        if ($(".redirect_type").is(":visible")) {
            redirect_type = $(".redirect_type:checked").val();
        }
        var redirect_id = "";
        var checkFlag = true;
        var checkFlagRedirection = true;
        if (redirect_type == "store") {
            redirect_id = $('#storeId').val();
            if (redirect_id == "") {
                checkFlag = false;
                checkFlagRedirection = "store";
            }
        } else if (redirect_type == "product") {
            redirect_id = $('#productId').val();
            if (redirect_id == "") {
                checkFlag = false;
                checkFlagRedirection = "product";
            }
        } else if (redirect_type == "external_link") {
            redirect_id = $('#external_link').val();
            if (redirect_id == "") {
                checkFlag = false;
                checkFlagRedirection = "external_link";
            }
        }
        if ($("#is_publish").is(':checked')) {
            is_publish = true;
        }
        if (title == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.title_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (isNaN(set_order)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>{{trans('lang.set_order_error')}}</p>");
            window.scrollTo(0, 0);
        } else if (checkFlag == false) {
            $(".error_top").show();
            $(".error_top").html("");
            if (checkFlagRedirection == "external_link") {
                $(".error_top").append("<p>{{trans('lang.set_external_error')}}</p>");
            } else {
                $(".error_top").append("Please Select " + checkFlagRedirection);
            }
            window.scrollTo(0, 0);
        } else {
            storeImageData().then(IMG => {
            database.collection('menu_items').doc(id).update({
                'title': title,
                'photo': IMG,
                'id': id,
                'set_order': set_order,
                'is_publish': is_publish,
                'position': position,
                'redirect_type': redirect_type,
                'redirect_id': redirect_id
            }).then(function(result) {
                window.location.href = '{{ route("setting.banners")}}';
            }).catch(function(error) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>" + error + "</p>");
            });
        }).catch(err => {
                jQuery("#data-table_processing").hide();
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>" + err + "</p>");
                window.scrollTo(0, 0);
            });
        }
    });
    function getTypeWiseDetails(redirect_type, redirect_id = '') {
        if (redirect_type == "store") {
            $('#storeId').html("");
            $('#storeId').append($("<option value=''>Select Store</option>"));
            var ref_vendors = database.collection('vendors');
            ref_vendors.get().then(async function(snapshots) {
                snapshots.docs.forEach((listval) => {
                    var data = listval.data();
                    $('#storeId').append($("<option></option>")
                        .attr("value", data.id)
                        .text(data.title));
                })
                if (redirect_id) {
                    $('#storeId').val(redirect_id);
                }
            })
        } else if (redirect_type == "product") {
            $('#productId').html("");
            $('#productId').append($("<option value=''>Select Product</option>"));
            var ref_vendor_products = database.collection('vendor_products');
            ref_vendor_products.get().then(async function(snapshots) {
                snapshots.docs.forEach((listval) => {
                    var data = listval.data();
                    $('#productId').append($("<option></option>")
                        .attr("value", data.id)
                        .text(data.name));
                })
                if (redirect_id) {
                    $('#productId').val(redirect_id);
                }
            })
        }
    }
</script>
@endsection
