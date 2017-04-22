var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};

export function show_stack_custom(type='info', msg='默认提示') {

    var opts = {
        title: "提示信息",
        text: msg,
        addclass: "stack-bottomright",
        stack: stack_bottomright,
        hide: true,
        delay: 2000
    };
    switch (type) {
        case 'error':
            opts.title = "提示";
            opts.text += ":操作失败";
            opts.type = "error";
            break;
        case 'notice':
            opts.title = "提示";
            opts.text += ":警告";
            opts.type = "notice";
            break;
        case 'info':
            opts.title = "提示";
            opts.text += ":获取信息";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "提示";
            opts.text += ':操作成功';
            opts.type = "success";
            break;
    }

    PNotify.prototype.options.styling = "fontawesome";
    new PNotify(opts);
}