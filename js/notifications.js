class Notify {
    static timeout = 5000;

    static default({title, description, closeTimeout = this.timeout, type}) {
        GrowlNotification.notify({
            title,
            description,
            closeTimeout,
            type
        })
    }
    
    static success({title, description, closeTimeout}) {
        const type = 'success';
        this.default({title, description, closeTimeout, type})
    }

    static error({title, description, closeTimeout}) {
        const type = 'error';
        this.default({title, description, closeTimeout, type})
    }

    static warning({title, description, closeTimeout}) {
        const type = 'warning';
        this.default({title, description, closeTimeout, type})
    }

    static info({title, description, closeTimeout}) {
        const type = 'info';
        this.default({title, description, closeTimeout, type})
    }

    static confirm({title, description, action}) {
        GrowlNotification.notify({
            title,
            description,
            closeWith: ['button'],
            showButtons: true,
            buttons: {
                action: action,
                cancel: {}
            }
        })
    }
}