(function ($) {
    'use strict';

    class FirewallBlockIps {
        constructor() {
            this.initEvents();
            this.createTableRow('IP Block', '191.168.200.201', '22.03.2020 22:42', 'Yahoo crawler', 'Permanent', '0', 'Never');
            this.createTableRow('IP Block', '192.168.200.145', '22.03.2020 00:42', 'Bad bot', 'Permanent', '0', 'Never');
        }

        initEvents() {
            var self = this;

            $('#wtitan-blocks-ips').click(function (e) {
                e.preventDefault();

                let $self = $(this),
                    infosModal = $('#wtitan-tmpl-block-ips-modal'),
                    btn = jQuery(this);

                if (!infosModal.length) {
                    console.log('[Error]: Html template for modal not found.');
                    return;
                }

                Swal.fire({
                    html: infosModal.html(),
                    customClass: 'wtitan-modal wtitan-ips-blocking-modal',
                    width: 500,
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'Block',
                    preConfirm: function () {
                        return self.preConfirmModal();
                    },
                    onOpen: function () {
                        $('.wtitan-ips-blocking-modal__tab').find('a').click(function () {
                            $('.wtitan-ips-blocking-modal__tab').removeClass('wtitan-ips-blocking-modal__tab--active');
                            $('.wtitan-ips-blocking-modal__tab-content').removeClass('wtitan-ips-blocking-modal__tab-content--active');

                            $(this).parent().addClass('wtitan-ips-blocking-modal__tab--active');

                            let tabID = $(this).attr('href').replace('#', '');
                            $('#wtitan-ips-blocking-modal__' + tabID + '-tab-content').addClass('wtitan-ips-blocking-modal__tab-content--active')
                        });
                    }
                }).then(function (result) {
                    if (result.value) {
                        console.log(result);
                    }
                });
            });
        }

        preConfirmModal() {
            return new Promise((resolve, reject) => {
                $.ajax(ajaxurl, {
                    type: 'post',
                    dataType: 'json',
                    data: {
                        action: 'wtitan-block-ips',
                        payload: {
                            type: $('.wtitan-ips-blocking-modal__tab--active').find('a').attr('href').replace('#', ''),
                            duration: 0,
                            reason: $('#wtitan-ips-blocking-modal__form-reason-field').val(),
                            ip: $('#wtitan-ips-blocking-modal__form-ip-field').val(),
                            ipRange: $('#wtitan-ips-blocking-modal__form-range-ip-field').val(),
                            hostname: $('#wtitan-ips-blocking-modal__form-hostname-field').val(),
                            userAgent: $('#wtitan-ips-blocking-modal__form-user-agent-field').val(),
                            referrer: $('#wtitan-ips-blocking-modal__form-referrer-field').val(),
                        },
                        _wpnonce: $('#wtitan-blocks-ips').data('nonce')
                    },
                    success: function (data, textStatus, jqXHR) {
                        var noticeId;

                        console.log(data);

                        if (!data || data.error) {
                            console.log(data);

                            if (data) {
                                noticeId = $.wbcr_factory_clearfy_227.app.showNotice(data.error_message, 'danger');
                            }

                            setTimeout(function () {
                                $.wbcr_factory_clearfy_227.app.hideNotice(noticeId);
                            }, 5000);
                            return data;
                        }

                        resolve(data)
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(xhr.responseText);
                        console.log(thrownError);

                        var noticeId = $.wbcr_factory_clearfy_227.app.showNotice('Error: [' + thrownError + '] Status: [' + xhr.status + '] Error massage: [' + xhr.responseText + ']', 'danger');
                        reject(thrownError);
                        Swal.close();
                    }
                });
            })
        }

        createTableRow(blockType, detail, ruleAdded, reason, expiration, blockCount, lastAttempt) {
            let tableBodyElement = $('.wtitan-ips-blocking__table').find('tbody'),
                row = $('<tr>').clone();

            row.appendTo(tableBodyElement);
            row.append($('<td>').html('<input type="checkbox">').clone());
            row.append($('<td>').html(blockType).clone());
            row.append($('<td>').html(detail).clone());
            row.append($('<td>').html(ruleAdded).clone());
            row.append($('<td>').html(reason).clone());
            row.append($('<td>').html(expiration).clone());
            row.append($('<td>').html(blockCount).clone());
            row.append($('<td>').html(lastAttempt).clone());
        }
    }

    jQuery(document).ready(function ($) {
        new FirewallBlockIps();
    });
})(jQuery);
