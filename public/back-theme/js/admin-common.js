/**
 * NextIn Admin — shared UI utilities
 */
(function ($) {
    'use strict';

    window.AdminUI = {
        initSelect2: function (context) {
            if (typeof $.fn.select2 !== 'function') {
                return;
            }
            var $root = context ? $(context) : $(document);
            $root.find('.custom_select').each(function () {
                var $el = $(this);
                if ($el.data('select2')) {
                    return;
                }
                $el.select2({
                    width: '100%',
                    dropdownParent: $(document.body),
                    minimumResultsForSearch: 8,
                    placeholder: $el.find('option[value=""]').text() || 'Select an option',
                    allowClear: $el.find('option[value=""]').length > 0
                });
            });
        },

        clearValidationErrors: function (formSelector) {
            var $form = $(formSelector);
            $form.find('.is-invalid').removeClass('is-invalid');
            $form.find('.select2-selection').removeClass('is-invalid');
            $form.find('.invalid-feedback').remove();
        },

        showValidationErrors: function (xhr, formSelector) {
            this.clearValidationErrors(formSelector);

            if (xhr.status === 419) {
                toastr.error('Your session expired. Please refresh the page and try again.');
                return false;
            }

            if (xhr.status === 401 || xhr.status === 403) {
                toastr.error('You are not authorized. Please log in again.');
                return false;
            }

            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors;
                var shown = [];

                $.each(errors, function (field, messages) {
                    var message = messages[0];
                    shown.push(message);

                    var $field = $(formSelector).find('[name="' + field + '"]');
                    if (!$field.length) {
                        $field = $(formSelector).find('#' + field);
                    }

                    $field.addClass('is-invalid');

                    if ($field.hasClass('custom_select') && $field.next('.select2-container').length) {
                        $field.next('.select2-container').find('.select2-selection').addClass('is-invalid');
                    }

                    var $wrapper = $field.closest('.admin-form-field, .col-sm-7, .admin-filter-field');
                    if (!$wrapper.length) {
                        $wrapper = $field.parent();
                    }

                    $wrapper.append('<div class="invalid-feedback d-block">' + message + '</div>');
                });

                if (shown.length) {
                    toastr.error(shown[0]);
                }
                return true;
            }

            var fallback = 'Something went wrong. Please try again.';
            if (xhr.responseJSON) {
                if (xhr.responseJSON.message) {
                    fallback = xhr.responseJSON.message;
                } else if (xhr.responseJSON.msg) {
                    fallback = xhr.responseJSON.msg;
                } else if (xhr.responseJSON.error) {
                    fallback = xhr.responseJSON.error;
                }
            } else if (xhr.responseText && xhr.status !== 422) {
                try {
                    var parsed = JSON.parse(xhr.responseText);
                    fallback = parsed.message || parsed.msg || parsed.error || fallback;
                } catch (e) {
                    if (xhr.responseText.length < 200) {
                        fallback = xhr.responseText;
                    }
                }
            }
            toastr.error(fallback);
            return false;
        },

        submitAjaxForm: function (options) {
            var formSelector = options.formSelector;
            var url = options.url;
            var $form = $(formSelector);

            if (options.beforeSubmit && options.beforeSubmit($form) === false) {
                return;
            }

            this.clearValidationErrors(formSelector);

            var formData = new FormData($form[0]);
            $('#loading').addClass('is-active');

            $.ajax({
                type: options.method || 'POST',
                url: url,
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#loading').removeClass('is-active');

                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.msg || data.message || 'Saved successfully.',
                            confirmButtonText: 'OK'
                        }).then(function () {
                            if (options.onSuccess) {
                                options.onSuccess(data);
                            }
                        });
                        return;
                    }

                    toastr.error(data.msg || data.message || 'Request failed.');
                },
                error: function (xhr) {
                    $('#loading').removeClass('is-active');
                    AdminUI.showValidationErrors(xhr, formSelector);
                    if (options.onError) {
                        options.onError(xhr);
                    }
                }
            });
        },

        showLoader: function () {
            $('#loading').addClass('is-active');
        },

        hideLoader: function () {
            $('#loading').removeClass('is-active');
        },

        validateProjectForm: function ($form) {
            var isValid = true;
            var categoryId = $form.find('[name="category_id"]').val();
            var name = $.trim($form.find('[name="name"]').val() || '');

            if ($form.find('[name="category_id"]').length && !categoryId) {
                var $category = $form.find('[name="category_id"]');
                $category.addClass('is-invalid');
                if ($category.hasClass('custom_select') && $category.next('.select2-container').length) {
                    $category.next('.select2-container').find('.select2-selection').addClass('is-invalid');
                }
                $category.closest('.admin-form-field').append(
                    '<div class="invalid-feedback d-block">Please select a project category.</div>'
                );
                isValid = false;
            }

            if (!name) {
                var $name = $form.find('[name="name"]');
                $name.addClass('is-invalid');
                $name.closest('.admin-form-field').append(
                    '<div class="invalid-feedback d-block">Please enter the project name.</div>'
                );
                isValid = false;
            }

            if (!isValid) {
                toastr.error('Please fix the highlighted fields.');
            }

            return isValid;
        },

        initImagePreview: function () {
            var input = document.getElementById('imageInput');
            var preview = document.getElementById('imagePreview');
            if (!input || !preview) {
                return;
            }

            input.addEventListener('change', function (event) {
                var file = event.target.files[0];
                if (!file) {
                    return;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview" class="img-fluid rounded">';
                };
                reader.readAsDataURL(file);
            });
        }
    };

    $(document).ready(function () {
        AdminUI.initSelect2();
        AdminUI.initImagePreview();

        $('.modal').on('shown.bs.modal', function () {
            AdminUI.initSelect2(this);
        });
    });
})(jQuery);
