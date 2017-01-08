window.hjSiteSettings = window.hjSiteSettings || {"testers_widgets":[],"polls":[],"recording_capture_keystrokes":true,"site_id":302606,"deferred_page_contents":[],"record_targeting_rules":[],"surveys":[],"heatmaps":[{"targeting":[{"negate":false,"pattern":"https:\/\/camposcoffee.com\/our-story\/our-coffee\/","match_operation":"simple","component":"url"}],"created_epoch_time":1477625530,"id":869896,"selector_version":0},{"targeting":[{"negate":false,"pattern":"https:\/\/camposcoffee.com\/our-story\/social-good\/","match_operation":"simple","component":"url"}],"created_epoch_time":1477625517,"id":869895,"selector_version":0}],"feedback_widgets":[],"forms":[],"record":false,"r":1.0,"state_change_listen_mode":"manual"};

window.hjBootstrap = window.hjBootstrap || function (scriptUrl) {
    var s = function () {}, h, v;

    if (!document.addEventListener) {
        return;
    }

    h = document.createElement('script');
    h.src = scriptUrl;
    document.getElementsByTagName('head')[0].appendChild(h);

    v = document.createElement('iframe');
    v.style.cssText = 'position: fixed !important; top: -100px !important; left: -100px !important; width: 1px !important; height: 1px !important;';
    v.id = '_hjRemoteVarsFrame';
    v.src = 'https://' + (window._hjSettings.varsHost || 'vars.hotjar.com') + '/rcj-2e6153f931e5c8a79f89c0c503e3c25e.html';
    v.onload = function () {
        s.varsLoaded = true;
        if ((typeof hj != 'undefined') && hj.event) {
            hj.event.signal('varsLoaded');
        }
    };
    s.varsJar = v;

    if (document.body) {
        document.body.appendChild(v);
    } else {
        document.addEventListener('DOMContentLoaded', function () {
            document.body.appendChild(v);
        });
    }
    window.hjBootstrap = s;
};


hjBootstrap('https://script.hotjar.com/modules-ec12ee2ed1767aa1ebc8d90166f1c7c4.js');