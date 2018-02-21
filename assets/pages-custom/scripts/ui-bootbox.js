function confirmRemove(url) {
    bootbox.confirm({
        size: "small",
        message: "<h4 class='text-center text-primary sbold'>Bạn có chắc chắn muốn xoá?</h4>",
        buttons: {
            confirm: {
                label: 'Đồng ý',
                className: 'btn-success pull-right'
            },
            cancel: {
                label: 'Không',
                className: 'btn-danger pull-left'
            }
        },
        callback: function(result) {
            if (result) {
                window.location.href = url;
            }
        }
    });
};
function confirmClose(url) {
    bootbox.confirm({
        size: "small",
        message: "<h4 class='text-center text-primary sbold'>Bạn có chắc chắn đóng công việc không?</h4>",
        buttons: {
            confirm: {
                label: 'Đồng ý',
                className: 'btn-success pull-right'
            },
            cancel: {
                label: 'Không',
                className: 'btn-danger pull-left'
            }
        },
        callback: function(result) {
            if (result) {
                window.location.href = url;
            }
        }
    });
}