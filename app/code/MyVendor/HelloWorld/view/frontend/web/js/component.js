define([
    'uiElement',
    'ko'
], function (ko) {
    'use strict';
    return function (config) {
        return {
            title: ko.observable('Hello World from ui component'),
            getModuleName: function () {
                return config;
            }
        }
    }
});
