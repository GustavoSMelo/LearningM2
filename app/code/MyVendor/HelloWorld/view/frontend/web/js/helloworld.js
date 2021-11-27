define([
    'uiComponent'
], function(Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'MyVendor_HelloWorld/helloworld',
        },
        initialize: function () {
            this._super();
            console.log('Hello World!');

            this.stringcriativa = 'uma string criativa ';
            this.xmlmessage = this.message;
        }
    });
});
