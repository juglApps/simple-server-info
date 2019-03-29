/**
 * Simple Server Info
 *
 * @author JuglApps - https://juglapps.com
 *
 */

;(function ($, window, document) {
    "use strict";

    // Create the defaults once
    var pluginName = 'simpleServerInfo',
        defaults = {};

    // The actual plugin constructor
    function Plugin(element, options) {

        // We don't want to alter the default options for future instances of the plugin
        // Load the localized vars to the plugin settings too
        // this.settings = $.extend({}, defaults, simpleServerInfoVars || {}, options || {});
        this.$form = $(element);

        this._defaults = defaults;
        this._name = pluginName;

        this.init();

    }

    // Avoid Plugin.prototype conflicts
    $.extend(Plugin.prototype, {
        init: function () {

            var self = this;

        },
    });

    // A really lightweight plugin wrapper around the constructor, preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
            }
        });
    };


    // Init the plugin on document ready
    $(function () {

        $('.body').simpleServerInfo();

    });

})(jQuery, window, document);