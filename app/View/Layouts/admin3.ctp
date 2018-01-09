<!DOCTYPE html>
<!-- saved from url=(0044)https://squareup.com/dashboard/items/library -->
<html lang="en-US" class="country-VN language-en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Square Dashboard</title>

  <script type="text/javascript" src="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/fa8c539b21"></script>
  <script src="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/nr-1044.min.js"></script>
  <script type="text/javascript" nonce="">
    window.NREUM || (NREUM = {}), __nr_require = function (e, n, t) {
      function r(t) {
        if (!n[t]) {
          var o = n[t] = {
            exports: {}
          };
          e[t][0].call(o.exports, function (n) {
            var o = e[t][1][n];
            return r(o || n)
          }, o, o.exports)
        }
        return n[t].exports
      }
      if ("function" == typeof __nr_require) return __nr_require;
      for (var o = 0; o < t.length; o++) r(t[o]);
      return r
    }({
      1: [function (e, n, t) {
        function r() {}

        function o(e, n, t) {
          return function () {
            return i(e, [c.now()].concat(u(arguments)), n ? null : this, t), n ? void 0 : this
          }
        }
        var i = e("handle"),
          a = e(2),
          u = e(3),
          f = e("ee").get("tracer"),
          c = e("loader"),
          s = NREUM;
        "undefined" == typeof window.newrelic && (newrelic = s);
        var p = ["setPageViewName", "setCustomAttribute", "setErrorHandler", "finished", "addToTrace",
            "inlineHit", "addRelease"
          ],
          d = "api-",
          l = d + "ixn-";
        a(p, function (e, n) {
            s[n] = o(d + n, !0, "api")
          }), s.addPageAction = o(d + "addPageAction", !0), s.setCurrentRouteName = o(d + "routeName", !0), n.exports =
          newrelic, s.interaction = function () {
            return (new r).get()
          };
        var m = r.prototype = {
          createTracer: function (e, n) {
            var t = {},
              r = this,
              o = "function" == typeof n;
            return i(l + "tracer", [c.now(), e, t], r),
              function () {
                if (f.emit((o ? "" : "no-") + "fn-start", [c.now(), r, o], t), o) try {
                  return n.apply(this, arguments)
                } finally {
                  f.emit("fn-end", [c.now()], t)
                }
              }
          }
        };
        a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","), function (e, n) {
          m[n] = o(l + n)
        }), newrelic.noticeError = function (e) {
          "string" == typeof e && (e = new Error(e)), i("err", [e, c.now()])
        }
      }, {}],
      2: [function (e, n, t) {
        function r(e, n) {
          var t = [],
            r = "",
            i = 0;
          for (r in e) o.call(e, r) && (t[i] = n(r, e[r]), i += 1);
          return t
        }
        var o = Object.prototype.hasOwnProperty;
        n.exports = r
      }, {}],
      3: [function (e, n, t) {
        function r(e, n, t) {
          n || (n = 0), "undefined" == typeof t && (t = e ? e.length : 0);
          for (var r = -1, o = t - n || 0, i = Array(o < 0 ? 0 : o); ++r < o;) i[r] = e[n + r];
          return i
        }
        n.exports = r
      }, {}],
      4: [function (e, n, t) {
        n.exports = {
          exists: "undefined" != typeof window.performance && window.performance.timing && "undefined" !=
            typeof window.performance.timing.navigationStart
        }
      }, {}],
      ee: [function (e, n, t) {
        function r() {}

        function o(e) {
          function n(e) {
            return e && e instanceof r ? e : e ? f(e, u, i) : i()
          }

          function t(t, r, o, i) {
            if (!d.aborted || i) {
              e && e(t, r, o);
              for (var a = n(o), u = m(t), f = u.length, c = 0; c < f; c++) u[c].apply(a, r);
              var p = s[y[t]];
              return p && p.push([b, t, r, a]), a
            }
          }

          function l(e, n) {
            v[e] = m(e).concat(n)
          }

          function m(e) {
            return v[e] || []
          }

          function w(e) {
            return p[e] = p[e] || o(t)
          }

          function g(e, n) {
            c(e, function (e, t) {
              n = n || "feature", y[t] = n, n in s || (s[n] = [])
            })
          }
          var v = {},
            y = {},
            b = {
              on: l,
              emit: t,
              get: w,
              listeners: m,
              context: n,
              buffer: g,
              abort: a,
              aborted: !1
            };
          return b
        }

        function i() {
          return new r
        }

        function a() {
          (s.api || s.feature) && (d.aborted = !0, s = d.backlog = {})
        }
        var u = "nr@context",
          f = e("gos"),
          c = e(2),
          s = {},
          p = {},
          d = n.exports = o();
        d.backlog = s
      }, {}],
      gos: [function (e, n, t) {
        function r(e, n, t) {
          if (o.call(e, n)) return e[n];
          var r = t();
          if (Object.defineProperty && Object.keys) try {
            return Object.defineProperty(e, n, {
              value: r,
              writable: !0,
              enumerable: !1
            }), r
          } catch (i) {}
          return e[n] = r, r
        }
        var o = Object.prototype.hasOwnProperty;
        n.exports = r
      }, {}],
      handle: [function (e, n, t) {
        function r(e, n, t, r) {
          o.buffer([e], r), o.emit(e, n, t)
        }
        var o = e("ee").get("handle");
        n.exports = r, r.ee = o
      }, {}],
      id: [function (e, n, t) {
        function r(e) {
          var n = typeof e;
          return !e || "object" !== n && "function" !== n ? -1 : e === window ? 0 : a(e, i, function () {
            return o++
          })
        }
        var o = 1,
          i = "nr@id",
          a = e("gos");
        n.exports = r
      }, {}],
      loader: [function (e, n, t) {
        function r() {
          if (!x++) {
            var e = h.info = NREUM.info,
              n = d.getElementsByTagName("script")[0];
            if (setTimeout(s.abort, 3e4), !(e && e.licenseKey && e.applicationID && n)) return s.abort();
            c(y, function (n, t) {
              e[n] || (e[n] = t)
            }), f("mark", ["onload", a() + h.offset], null, "api");
            var t = d.createElement("script");
            t.src = "https://" + e.agent, n.parentNode.insertBefore(t, n)
          }
        }

        function o() {
          "complete" === d.readyState && i()
        }

        function i() {
          f("mark", ["domContent", a() + h.offset], null, "api")
        }

        function a() {
          return E.exists && performance.now ? Math.round(performance.now()) : (u = Math.max((new Date).getTime(),
            u)) - h.offset
        }
        var u = (new Date).getTime(),
          f = e("handle"),
          c = e(2),
          s = e("ee"),
          p = window,
          d = p.document,
          l = "addEventListener",
          m = "attachEvent",
          w = p.XMLHttpRequest,
          g = w && w.prototype;
        NREUM.o = {
          ST: setTimeout,
          SI: p.setImmediate,
          CT: clearTimeout,
          XHR: w,
          REQ: p.Request,
          EV: p.Event,
          PR: p.Promise,
          MO: p.MutationObserver
        };
        var v = "" + location,
          y = {
            beacon: "bam.nr-data.net",
            errorBeacon: "bam.nr-data.net",
            agent: "js-agent.newrelic.com/nr-1044.min.js"
          },
          b = w && g && g[l] && !/CriOS/.test(navigator.userAgent),
          h = n.exports = {
            offset: u,
            now: a,
            origin: v,
            features: {},
            xhrWrappable: b
          };
        e(1), d[l] ? (d[l]("DOMContentLoaded", i, !1), p[l]("load", r, !1)) : (d[m]("onreadystatechange", o), p[
          m]("onload", r)), f("mark", ["firstbyte", u], null, "api");
        var x = 0,
          E = e(4)
      }, {}]
    }, {}, ["loader"]);;
    NREUM.info = {
      beacon: "bam.nr-data.net",
      errorBeacon: "bam.nr-data.net",
      licenseKey: "fa8c539b21",
      applicationID: "31249050",
      sa: 1
    }
  </script>



  <meta name="external-user-session-token" content="19bd3ad4bda3cf9da41a5f3fa42586ba1f36f5202fb9194e4c6ab3faab60bb96">
  <meta name="thumbor-endpoint" content="images-production-f.squarecdn.com">
  <meta name="viewport" content="width=device-width, user-scalable=no, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-itunes-app" content="app-id=992958748">



  <style>
    .preloading-logo-container {
      background-color: #fff;
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    @keyframes preloading-logo {
      from {
        transform: rotate(0deg);
      }
      to {
        transform: rotate(359deg);
      }
    }

    .preloading-logo {
      background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAMAAAAPkIrYAAAAk1BMVEUAAAA9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUw9RUygvlziAAAAMXRSTlMABAsWEQccLTIk5b39UdOCXEs72czFtol0aGJG+PPfmpMoIK9XQ20/qO7qo3k2n36Oh533lQAAA0pJREFUWMOt1+tyokAQhuEeBobTooAnhDUIgqAG8f6vbr+h3MTEqMDk/UOVZT10T1kq9LTcm54WM2fjOAFDNDatODt///zPYbJRIEvqw1/03TLQMI75Ezg3Fnb8tDTNYAOkzWbTURt3FVe2zqjrw0L9NNOFJK3ZtDLubyStnpqxOnTUIa3Yg7GvmG68oHL3IK3jij+9YWfpz0cL3g5ocxL0IlDo2Wjro6QmJb2OvcCi4xHYVqNedRh/8Ob9ETkx9c0AxX/GYgfUW0n9Y7B+xBJJzSwaEuOyuzMTM8dxJDUCY99eXDoopKEZnAvB6UutpGIaniaQTjeZb6BSGpMukHGz4Q7WQhtlMS6+bFm8oZDGZQiR59oHvQC1pbHpeZ4LuuaBmvHRFoP1fzDmwnonUhjMtq+DVTOVsRCDZWsk285msxWpxGFxQtoEVqNkaTZiRBSAchkpldtZJpecwopILZ5lmVxyOZlMGkVLg2UTCVBzgxSDZTJKYJ1Jtdw0TZ32sCJli8PitILlKVs6LEEnWJaypcGyaTmfz3Nly7AsKyMXFle2GCyTFrC0X7AQzRGp11mu+lyypmksWv7OeXVWvVgshLJldFYK6xc+X2EYmtTCCpQtDssmH9Za2cphCapgbZUtswpDTnzhuq6hSLGwqiogNSzVw9dBNbhGsFQPzC7LKsO1hHVStMKyLDmu2hKYqbZiiRihFlakZJlJUpoka9zlcskVKCNBV+AMS+X0M1AhIZTA2ukKYwVBIgghJgd7H21ZQRBURLeDWSMpHiBBH112u1068n906QVBSJ/ZOxSNshrP8wKdboolloygbA+ZXyddwarNwRSXVMm+vXja1fXZHkjpXoEN7w7aqlFqD6WKwhN0V9JhQ9bkhezH23t1fTqdy/7H7vt+UWT0Y8VJFhs9v5Z92cM9ElDn86rPnqKIJfXkfK30jNK1/kLSyhj5vqAn8SmoNN162jMpjNfS8l7ckhWggG0fji/KNQLWMHqV3UoLtYHN7h6Iw3i/30vL49SnarqVXS6X1Tqwcl0DqenCrIp9FIGC5Wf9f4bbq4WmsrZ9RxGSlp8xGpAZXx5ZQT7ib7bf3lnrIDNGP04kxTp6hxXtfa/KdHrWP1rKVJv1uPAiAAAAAElFTkSuQmCC') 50% 50% no-repeat;
      width: 75px;
      height: 75px;
      animation: preloading-logo 1s linear infinite;
    }

    .preloading-text {
      margin-top: 15px;
      font: 14px "Square Market", "helvetica neue", helvetica, arial, sans-serif;
      color: #64696E;
    }
  </style>
</head>

<body class="">

  <div id="dashboard-navigation__container">
    <style>
      @keyframes navbar-primary-icons--open {
        0%,
        60% {
          opacity: 0
        }
        100% {
          opacity: 1
        }
      }

      @keyframes navbar-primary-icons--close {
        0%,
        60% {
          opacity: 0
        }
        100% {
          opacity: 1
        }
      }

      #dashboard-navigation__container * {
        box-sizing: border-box
      }

      body #dashboard-navigation__container,
      #dashboard-navigation__container button {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale
      }

      #dashboard-navigation__container a:focus {
        outline: none
      }

      #dashboard-navigation__container button {
        margin: 0;
        border: 0;
        padding: 0;
        display: inline-block;
        background: transparent;
        -moz-appearance: none;
        -webkit-appearance: none
      }

      #dashboard-navigation__container button:focus {
        outline: none
      }

      #dashboard-navigation__container .hyperlink {
        color: #2996cc;
        text-decoration: none;
        cursor: pointer
      }

      #dashboard-navigation__container .hyperlink:hover {
        color: #3ba8de
      }

      #dashboard-navigation__container .button:hover {
        background-color: #fff;
        transition-duration: .05s;
        color: #85898c
      }

      #dashboard-navigation__container .button:focus {
        background-color: #fff;
        border-color: #add8e6;
        color: #add8e6
      }

      #dashboard-navigation__container .button {
        font-family: inherit;
        display: inline-block;
        height: 32px;
        padding: 0 1em;
        border: 1px solid #c2c7cc;
        border-radius: 3px;
        background-color: #fafafa;
        font-size: 14px;
        color: #85898c;
        line-height: 30px;
        font-weight: 500;
        text-align: center;
        transition: background-color .2s ease-in-out, color .2s ease-in-out, opacity .2s ease-in-out;
        user-select: none;
        cursor: pointer;
        text-decoration: none
      }

      #dashboard-navigation__container .button--tall,
      #dashboard-navigation__container .button--large {
        height: 40px;
        line-height: 38px
      }

      #dashboard-navigation__container .button--large {
        padding: 0 2em
      }

      #dashboard-navigation__container .button--blue,
      #dashboard-navigation__container .button--gray {
        border-color: transparent;
        color: #fff
      }

      #dashboard-navigation__container .button.button--blue:hover,
      #dashboard-navigation__container .button.button--gray:hover,
      #dashboard-navigation__container .button.button--blue:focus,
      #dashboard-navigation__container .button.button--gray:focus {
        border-color: transparent;
        color: #fff
      }

      #dashboard-navigation__container .button--blue {
        background: #2996cc
      }

      #dashboard-navigation__container .button--blue.button:hover,
      #dashboard-navigation__container .button--blue.button:focus {
        background: #3ba8de
      }

      #dashboard-navigation__container .button--gray {
        background: #85898c
      }

      #dashboard-navigation__container .button--gray.button:hover,
      #dashboard-navigation__container .button--gray.button:focus {
        background: #c2c7cc
      }

      #dashboard-navigation__container .l-fill {
        width: 100%
      }

      #dashboard-navigation__container {
        color: #3d454d;
        font: 14px/1 "Square Market", "helvetica neue", helvetica, arial, sans-serif;
        text-rendering: optimizeLegibility
      }

      #dashboard-navigation__container .type-weight-medium {
        font-weight: 500
      }

      #dashboard-navigation__container .type-heading-4-size {
        font-size: 16px
      }

      #dashboard-navigation__container .type-align-center {
        text-align: center
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        background-color: #2b333b;
        -webkit-user-select: none;
        z-index: 501
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary.dashboard-navigation--desktop {
        transition: width .15s ease-out
      }

      @media print {
        #dashboard-navigation__container .dashboard-navigation__navbar-primary {
          display: none !important
        }
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary.dashboard-navigation--multiunit-topbar {
        top: 40px
      }

      .dashboard-navigation--has-mobile-topbar #dashboard-navigation__container .dashboard-navigation__navbar-primary {
        top: 100px
      }

      .dashboard-navigation--has-mobile-topbar.dashboard-navigation--has-multiunit-topbar #dashboard-navigation__container .dashboard-navigation__navbar-primary {
        top: 140px
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item {
        color: #c2c7cc;
        font-weight: 500;
        height: 36px
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item:hover {
        background-color: #3d454d
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item:hover a {
        color: #fff
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item a {
        display: block;
        padding: 11px 16px 11px 24px;
        color: #85898c;
        text-decoration: none;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item.navbar-item-is-active a {
        color: #fff;
        height: 36px;
        background-color: #3d454d;
        transition: width .15s ease-out
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item[data-id=logout] {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--desktop .navbar-primary--sections--inner-wrapper {
        position: absolute;
        left: 0;
        top: 0;
        height: calc(100% - (4px * 2));
        width: calc(100% - 8px);
        margin: 4px 8px 4px 0;
        overflow-x: hidden;
        overflow-y: auto;
        -ms-overflow-style: -ms-autohiding-scrollbar
      }

      #dashboard-navigation__container .dashboard-navigation--desktop .navbar-primary--sections--inner-wrapper::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 7px
      }

      #dashboard-navigation__container .dashboard-navigation--desktop .navbar-primary--sections--inner-wrapper::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: #85898c;
        -webkit-box-shadow: #85898c
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item--promo {
        width: 187px;
        border: 1px solid #58595b;
        border-radius: 3px;
        margin: 12px 8px 0 16px;
        text-align: center
      }

      #dashboard-navigation__container .dashboard-navigation__navbar-primary-item--promo a {
        padding-left: 12px;
        padding-right: 12px
      }

      #dashboard-navigation__container .dashboard-navigation--no-customscrollbar .dashboard-navigation__navbar-primary-item--promo {
        width: 187px;
        margin: 12px 16px
      }

      #dashboard-navigation__container .dashboard-navigation--expanded .dashboard-navigation__navbar-primary-item--promo {
        width: 202px;
        margin: 12px 16px
      }

      #dashboard-navigation__container .navbar__section .navbar__section {
        display: none
      }

      #dashboard-navigation__container .navbar-secondary-item {
        font-weight: 500
      }

      #dashboard-navigation__container .navbar__header--mobile,
      #dashboard-navigation__container .navbar__footer--mobile,
      #dashboard-navigation__container .navbar__header--mobile__icon-back {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar__header--mobile,
      #dashboard-navigation__container .dashboard-navigation--mobile .navbar__footer--mobile {
        display: block
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar__header,
      #dashboard-navigation__container .dashboard-navigation--mobile .l-navbar-primary__icons {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--closed .navbar__footer--mobile,
      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--closed .navbar-primary--sections--outer-wrapper {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item {
        display: none;
        position: relative;
        height: auto
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item:hover {
        background-color: transparent
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item .navbar-primary__icon-badge {
        margin-top: -4px
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item.dashboard-navigation__navbar-primary-item--mobilized {
        display: block
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item a {
        color: #fff;
        background-color: #58595b;
        padding-left: 15px;
        padding-right: 15px;
        margin-bottom: 1px;
        height: auto;
        font-size: 17px;
        font-weight: normal
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item a.dashboard-navigation__navbar-primary-item-action--parent {
        padding-right: 39px
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item a.dashboard-navigation__navbar-primary-item-action--parent:after {
        content: '';
        position: absolute;
        top: 0;
        right: 15px;
        width: 9px;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 16 26" enable-background="new 0 0 16 26"><polygon fill="#ffffff" points="3,0 0,3 10,13 0,23 3,26 16,13 "></polygon></svg>') 0 50% no-repeat
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item.navbar-item-is-active>a {
        background-color: #58595b;
        border: solid 1px #fff
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item--promo {
        width: 100%;
        margin: 12px 0;
        border-radius: 0
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .dashboard-navigation__navbar-primary-item--promo a {
        background-color: transparent
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down .navbar__section {
        border-bottom-width: 0
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down .navbar__section--promo {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down .navbar__section .navbar__section {
        display: block
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down .dashboard-navigation__navbar-primary-item-action {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down.navbar-primary--opened .navbar__header--mobile__icon-back {
        display: block
      }

      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down.navbar-primary--opened .navbar-primary__impersonating,
      #dashboard-navigation__container .dashboard-navigation--mobile.navbar-primary--drilled-down.navbar-primary--opened .navbar__logo {
        display: none
      }

      #dashboard-navigation__container .navbar-item-is-expanded>.navbar__section>.dashboard-navigation__navbar-primary-item>.dashboard-navigation__navbar-primary-item-action {
        display: block !important
      }

      #dashboard-navigation__container .navbar-primary--sections {
        overflow: hidden
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar-primary--sections--outer-wrapper {
        height: auto;
        position: absolute;
        top: 50px;
        bottom: 0;
        overflow-y: auto
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar-primary--sections {
        padding-left: 15px;
        padding-right: 15px
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar__logo--closed {
        display: none
      }

      #dashboard-navigation__container .navbar-primary__icon-badge {
        float: right;
        background-color: #2996cc;
        border-radius: 50%;
        color: #fff;
        width: 24px;
        height: 24px;
        display: block;
        text-align: center;
        padding-top: 6px;
        font-size: 11px;
        margin-top: -5px;
        font-weight: 700
      }

      #dashboard-navigation__container .navbar-primary__icon-badge-no-count {
        display: none
      }

      #dashboard-navigation__container .navbar-secondary-item__badge {
        background-color: #2996cc;
        border-radius: 50%;
        color: #fff;
        width: 24px;
        height: 24px;
        display: block;
        text-align: center;
        padding-top: 6px;
        font-size: 11px;
        margin-top: -3px;
        font-weight: 700;
        float: left;
        margin-right: 10px
      }

      #dashboard-navigation__container .l-navbar-primary__icons {
        position: absolute;
        top: 24px;
        width: 24px
      }

      #dashboard-navigation__container .l-navbar-primary__icons .navbar-primary__icon-menu {
        margin-bottom: 20px
      }

      #dashboard-navigation__container .navbar-primary__icon {
        width: 100%;
        margin-bottom: 25px
      }

      #dashboard-navigation__container .navbar-primary__icon-menu {
        width: 24px;
        height: 24px
      }

      #dashboard-navigation__container .navbar-primary__icon-menu path {
        fill: #fff
      }

      #dashboard-navigation__container .navbar__logo {
        width: 22px;
        height: 22px
      }

      #dashboard-navigation__container .navbar__logo path {
        fill: #fff
      }

      #dashboard-navigation__container .navbar__logo--closed {
        visibility: visible;
        opacity: 1;
        transition: opacity .12s ease-out .18s;
        position: absolute;
        bottom: 24px;
        left: 24px
      }

      #dashboard-navigation__container .navbar__logo--closed path {
        fill: #58595b
      }

      #dashboard-navigation__container .navbar__footer--mobile {
        text-align: center;
        color: #85898c;
        text-transform: uppercase;
        font-weight: 500;
        padding-top: 16px;
        padding-bottom: 16px
      }

      #dashboard-navigation__container .navbar__footer--mobile a {
        color: #85898c
      }

      #dashboard-navigation__container .navbar-primary--opened {
        display: block
      }

      #dashboard-navigation__container .navbar-primary--opened .l-navbar-primary__icons {
        right: 24px;
        animation: navbar-primary-icons--open .3s
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation--mobile .navbar-item-is-active {
        width: auto
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar-primary--visible-when-opened {
        visibility: visible;
        opacity: 1;
        transition: opacity .3s ease-out;
        width: 100%
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar-primary--visible-when-closed {
        visibility: hidden;
        opacity: 0;
        transition: opacity .3s ease-out
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar-primary--visible-when-closed.navbar__merchant--title,
      #dashboard-navigation__container .navbar-primary--opened .navbar-primary--visible-when-closed.navbar-primary__icon {
        display: none
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation__navbar-primary {
        width: 234px
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation__navbar-primary.dashboard-navigation--mobile {
        width: auto;
        right: 0
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar__section {
        margin-right: 8px;
        border-bottom: 1px solid #58595b
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar__section:not(:last-of-type) {
        margin-bottom: 24px;
        padding-bottom: 24px
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar__section--promo,
      #dashboard-navigation__container .navbar-primary--opened .navbar__section--promo:not(:last-of-type) {
        margin-bottom: -12px
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar__section--aux,
      #dashboard-navigation__container .navbar-primary--opened .navbar__section--promo {
        border-bottom: none
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar__logo--closed {
        opacity: 0;
        visibility: hidden
      }

      #dashboard-navigation__container .navbar-primary--opened .navbar-primary__icon-badge {
        margin-right: -16px
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation--mobile .navbar__section {
        margin-right: 0
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation--mobile .navbar__section:not(:last-of-type) {
        margin-bottom: 0;
        padding-bottom: 0
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation--mobile .navbar__section--border {
        border-bottom: none
      }

      #dashboard-navigation__container .navbar-primary--opened.dashboard-navigation--mobile .navbar-primary__icon-badge {
        margin-right: 0
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--expanded .navbar-primary--sections--inner-wrapper,
      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--no-customscrollbar .navbar-primary--sections--inner-wrapper {
        height: 100%;
        width: 100%;
        margin: 0
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--expanded .navbar__section,
      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--no-customscrollbar .navbar__section {
        margin-right: 0
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--expanded .dashboard-navigation__navbar-primary-item a,
      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--no-customscrollbar .dashboard-navigation__navbar-primary-item a {
        padding: 11px 24px
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--expanded .navbar-primary__icon-badge,
      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--no-customscrollbar .navbar-primary__icon-badge {
        margin-right: 0
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--expanded .navbar__section--promo {
        position: absolute;
        bottom: 16px;
        padding-bottom: 0
      }

      #dashboard-navigation__container .dashboard-navigation--no-customscrollbar .navbar__section--promo,
      #dashboard-navigation__container .dashboard-navigation--no-customscrollbar .navbar__section--promo:not(:last-of-type) {
        margin-bottom: -20px
      }

      #dashboard-navigation__container .dashboard-navigation--no-customscrollbar.dashboard-navigation--expanded .navbar__section--promo,
      #dashboard-navigation__container .dashboard-navigation--no-customscrollbar.dashboard-navigation--expanded .navbar__section--promo:not(:last-of-type) {
        margin-bottom: -12px
      }

      #dashboard-navigation__container .navbar-primary--closed {
        display: block;
        cursor: pointer
      }

      #dashboard-navigation__container .navbar-primary--closed:hover {
        background-color: #343d45
      }

      #dashboard-navigation__container .navbar-primary--closed .l-navbar-primary__icons {
        left: 23px;
        animation: navbar-primary-icons--close .3s
      }

      #dashboard-navigation__container .navbar-primary--closed .navbar-primary--visible-when-opened {
        visibility: hidden;
        opacity: 0
      }

      #dashboard-navigation__container .navbar-primary--closed .navbar-primary--visible-when-opened.navbar__merchant--title {
        display: none
      }

      #dashboard-navigation__container .navbar-primary--closed .navbar-primary--visible-when-closed {
        visibility: visible;
        opacity: 1
      }

      #dashboard-navigation__container .navbar-primary--closed.dashboard-navigation__navbar-primary {
        width: 70px
      }

      #dashboard-navigation__container .navbar-primary--closed.dashboard-navigation__navbar-primary.dashboard-navigation--mobile {
        width: 100%;
        bottom: auto
      }

      #dashboard-navigation__container .navbar-primary__impersonating {
        position: absolute;
        left: 24px;
        bottom: 24px;
        background-repeat: no-repeat;
        background-position: 0;
        background-image: url("/dashboard/assets/dashboard-navigation/admin/admin.gif");
        background-size: 72px;
        width: 60px;
        height: 48px
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.navbar-primary--closed .navbar-primary__impersonating {
        bottom: 11px;
        left: -2px
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar-primary__impersonating {
        top: 0;
        left: -12px
      }

      #dashboard-navigation__container .dashboard-navigation__topbar {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        color: #fff;
        cursor: pointer;
        z-index: 501
      }

      #dashboard-navigation__container .navbar__header {
        padding: 20px 8px 20px 24px
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--expanded .navbar__header,
      #dashboard-navigation__container .dashboard-navigation--desktop.dashboard-navigation--no-customscrollbar .navbar__header {
        padding: 24px 24px 20px
      }

      #dashboard-navigation__container .navbar__logo-icon {
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg style="fill: white" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg"><path d="M36.6 0H7.4C3.4 0 0 3.3 0 7.4v29.3c0 4 3.3 7.3 7.4 7.3h29.3c4 0 7.3-3.3 7.3-7.4V7.4c0-4-3.3-7.4-7.4-7.4zM36 33.7c0 1.3-1 2.3-2.3 2.3H10.3C9 36 8 35 8 33.7V10.3C8 9 9 8 10.3 8h23.4C35 8 36 9 36 10.3v23.4z"></path><path d="M17.3 28c-.7 0-1.3-.6-1.3-1.3v-9.4c0-.7.6-1.3 1.3-1.3h9.4c.7 0 1.3.6 1.3 1.3v9.4c0 .7-.6 1.3-1.3 1.3h-9.4z"></path></svg>')
      }

      #dashboard-navigation__container .navbar__logo--desktop {
        margin: 0 0 19.2px
      }

      #dashboard-navigation__container .navbar__merchant {
        padding: 0;
        font-weight: 700;
        line-height: 1.4;
        color: #fff;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      #dashboard-navigation__container .dashboard-navigation__toolbar-item {
        display: block;
        color: #c2c7cc;
        line-height: 1.4;
        text-decoration: none;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      #dashboard-navigation__container .navbar__logo,
      #dashboard-navigation__container .navbar__header--mobile__icon-back,
      #dashboard-navigation__container .navbar__header--mobile__toggle {
        cursor: pointer
      }

      #dashboard-navigation__container .navbar__logo--desktop {
        cursor: default
      }

      #dashboard-navigation__container .navbar__logo--mobile,
      #dashboard-navigation__container .navbar__header--mobile__icon-back {
        position: absolute;
        width: 16px;
        height: 16px;
        top: 17px;
        left: 15px
      }

      #dashboard-navigation__container .navbar__header--mobile__icon-back path {
        fill: #fff
      }

      #dashboard-navigation__container .navbar__header--mobile__toggle {
        position: absolute;
        top: 17px;
        right: 15px
      }

      #dashboard-navigation__container .navbar-primary--visible-when-opened.navbar__header--mobile__icon-close {
        width: 21px;
        height: 21px;
        margin: -2.5px 0 0 -2.5px
      }

      #dashboard-navigation__container .navbar-primary--visible-when-opened.navbar__header--mobile__icon-close path {
        fill: #fff
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar__merchant {
        padding: 17px 46px;
        font-size: 16px;
        line-height: 1;
        text-align: center
      }

      #dashboard-navigation__container .dashboard-navigation--mobile .navbar-primary__icon-menu {
        width: 16px;
        height: 12px;
        margin-top: 2px
      }

      #dashboard-navigation__container .dashboard-navigation__notification-container--in-nav {
        float: right;
        position: relative;
        z-index: 10
      }

      #dashboard-navigation__container .dashboard-navigation__notification {
        position: relative
      }

      #dashboard-navigation__container .navbar-primary__icon-notification {
        cursor: pointer
      }

      #dashboard-navigation__container .navbar-primary__icon-notification svg {
        width: 24px;
        height: 24px
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.navbar-primary--opened .dashboard-navigation__notification svg {
        display: none
      }

      #dashboard-navigation__container .dashboard-navigation--desktop.navbar-primary--opened .dashboard-navigation__notification--in-nav svg {
        display: inline
      }

      #dashboard-navigation__container .l-navbar-popout--notification {
        left: 40px
      }

      #dashboard-navigation__container .navbar-primary--opened .l-navbar-popout--notification {
        top: -14px
      }

      #dashboard-navigation__container .navbar-primary--opened .l-navbar-popout--notification:after {
        top: 21px
      }

      #dashboard-navigation__container .navbar-primary--closed .l-navbar-popout--notification {
        top: -44px
      }

      #dashboard-navigation__container .navbar-primary--closed .l-navbar-popout--notification:after {
        top: 51px
      }

      #dashboard-navigation__container .l-navbar-popout--is-opened {
        display: block !important
      }

      #dashboard-navigation__container .l-navbar-popout--anchor {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        width: 1px;
        height: 1px
      }

      #dashboard-navigation__container .l-navbar-popout {
        position: absolute;
        z-index: 501;
        background: #2b333b;
        width: 355px;
        border-radius: 4px;
        padding: 24px
      }

      #dashboard-navigation__container .l-navbar-popout:after {
        z-index: 502;
        display: block;
        width: 10px;
        height: 10px;
        background: #2b333b;
        position: absolute;
        left: -5px;
        z-index: 1000;
        content: ' ';
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg)
      }

      #dashboard-navigation__container .l-navbar-popout .button {
        margin-bottom: 5px
      }

      #dashboard-navigation__container .navbar-popout__header {
        margin-bottom: 8px;
        line-height: 1.4;
        font-size: 16px;
        font-weight: 500
      }

      #dashboard-navigation__container .navbar-popout__message__p {
        line-height: 1.4;
        margin: 1em 0
      }

      #dashboard-navigation__container .navbar-popout__message__p:first-of-type {
        margin-top: 0
      }

      #dashboard-navigation__container .navbar-popout__message__p:last-of-type {
        margin-bottom: 0
      }

      #dashboard-navigation__container .navbar-popout__message__anchor:before {
        content: ' '
      }

      #dashboard-navigation__container .navbar-popout__detail {
        color: #fff;
        margin-bottom: 24px;
        padding: 0 24px
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 2000
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal__dialog {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 550px;
        margin-left: -275px;
        height: 456px;
        margin-top: -228px;
        z-index: 2001;
        background: #fff;
        border: 1px solid #a2a6aa;
        border-radius: 7px;
        overflow: hidden
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal__body {
        padding: 30px 34px;
        line-height: 1.75
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal__header {
        width: 100%;
        height: 66px;
        text-align: center;
        background: #f5f7f8;
        border-bottom: 1px solid #a2a6aa;
        font-size: 160%;
        font-weight: normal;
        padding-top: 22px;
        margin: 0
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal__text {
        margin: 0
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal__supported-browsers {
        border: 1px solid #c6cacf;
        border-left: none;
        border-right: none;
        margin: 17px 0;
        padding: 18px 33px
      }

      #dashboard-navigation__container .dashboard-navigation__old-browser-modal__footer {
        text-align: right;
        background: #f5f7f8;
        border-top: 1px solid #a2a6aa;
        padding: 17px;
        margin: 0;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0
      }

      #dashboard-navigation__container .dashboard-navigation__topbar--multiunit {
        background: #ec8947;
        height: 40px;
        padding: 13px
      }

      .dashboard-navigation--has-mobile-topbar #dashboard-navigation__container .dashboard-navigation__topbar--multiunit {
        top: 100px
      }

      #dashboard-navigation__container .dashboard-navigation__topbar--multiunit__title {
        position: absolute;
        left: 0;
        top: 13px;
        bottom: 0;
        right: 0;
        text-align: center;
        font-weight: 500
      }

      #dashboard-navigation__container .dashboard-navigation__topbar--multiunit__label:before {
        content: '< '
      }

      #dashboard-navigation__container .dashboard-navigation__topbar--mobile {
        background: #f2f4f5;
        text-align: center;
        color: #3d454d;
        font-weight: 500;
        height: 100px;
        font-size: 38px;
        padding: 26px;
        display: none
      }

      .dashboard-navigation--has-mobile-topbar #dashboard-navigation__container .dashboard-navigation__topbar--mobile {
        display: block
      }

      #sq-app-container {
        margin-left: 70px
      }

      @media screen and (min-width: 1258px) {
        #sq-app-container {
          margin-left: 234px
        }
      }

      @media print {
        #sq-app-container {
          margin-left: 0
        }
      }

      @media screen and (min-width: 320px) and (max-width: 479px) {
        #sq-app-container.mobile {
          margin-left: 0
        }
      }

      @media screen and (min-width: 480px) and (max-width: 767px) {
        #sq-app-container.mobile {
          margin-left: 0
        }
      }

      .dashboard-navigation--is-permanently-open #sq-app-container {
        margin-left: 234px
      }

      @media screen and (min-width: 320px) and (max-width: 479px) {
        .dashboard-navigation--is-permanently-open #sq-app-container.mobile {
          margin-left: 0
        }
      }

      @media screen and (min-width: 480px) and (max-width: 767px) {
        .dashboard-navigation--is-permanently-open #sq-app-container.mobile {
          margin-left: 0
        }
      }

      .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
        left: 70px
      }

      @media screen and (min-width: 1258px) {
        .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
          left: 234px
        }
      }

      @media print {
        .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
          left: 0
        }
      }

      @media screen and (min-width: 320px) and (max-width: 479px) {
        .mobile .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
          left: 0
        }
      }

      @media screen and (min-width: 480px) and (max-width: 767px) {
        .mobile .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
          left: 0
        }
      }

      .dashboard-navigation--is-permanently-open .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
        left: 234px
      }

      @media screen and (min-width: 320px) and (max-width: 479px) {
        .dashboard-navigation--is-permanently-open .mobile .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
          left: 0
        }
      }

      @media screen and (min-width: 480px) and (max-width: 767px) {
        .dashboard-navigation--is-permanently-open .mobile .dashboard-navigation__fixed-left-element.dashboard-navigation__fixed-left-element {
          left: 0
        }
      }

      #sq-app-container.mobile {
        margin-top: 50px
      }

      .dashboard-navigation--has-multiunit-topbar #sq-app-container {
        margin-top: 40px
      }

      @media screen and (min-width: 320px) and (max-width: 479px) {
        .dashboard-navigation--has-multiunit-topbar #sq-app-container.mobile {
          margin-top: 90px
        }
      }

      @media screen and (min-width: 480px) and (max-width: 767px) {
        .dashboard-navigation--has-multiunit-topbar #sq-app-container.mobile {
          margin-top: 90px
        }
      }

      .dashboard-navigation--has-mobile-topbar #sq-app-container {
        margin-top: 100px
      }

      .dashboard-navigation--has-multiunit-topbar.dashboard-navigation--has-mobile-topbar #sq-app-container {
        margin-top: 140px
      }

      .mobile .dashboard-navigation__fixed-top-element.dashboard-navigation__fixed-top-element {
        top: 50px
      }

      .dashboard-navigation--has-multiunit-topbar .dashboard-navigation__fixed-top-element.dashboard-navigation__fixed-top-element {
        top: 40px
      }

      @media screen and (min-width: 320px) and (max-width: 479px) {
        .dashboard-navigation--has-multiunit-topbar .mobile .dashboard-navigation__fixed-top-element.dashboard-navigation__fixed-top-element {
          top: 90px
        }
      }

      @media screen and (min-width: 480px) and (max-width: 767px) {
        .dashboard-navigation--has-multiunit-topbar .mobile .dashboard-navigation__fixed-top-element.dashboard-navigation__fixed-top-element {
          top: 90px
        }
      }

      .dashboard-navigation--has-mobile-topbar .dashboard-navigation__fixed-top-element.dashboard-navigation__fixed-top-element {
        top: 100px
      }

      .dashboard-navigation--has-multiunit-topbar.dashboard-navigation--has-mobile-topbar .dashboard-navigation__fixed-top-element.dashboard-navigation__fixed-top-element {
        top: 140px
      }

      .l-viewport-content,
      .l-viewport-content-with-nav {
        top: 0 !important;
        left: 0 !important
      }
    </style>
    <div class="dashboard-navigation__topbar--mobile dashboard-navigation__topbar">Switch to Mobile</div>
    <div class="dashboard-navigation__navbar-primary dashboard-navigation--desktop dashboard-navigation--expanded navbar-primary--opened">
      <div class="navbar__header--mobile">
        <div class="navbar__logo navbar__logo--mobile">
          <a class="navbar__logo-link" href="https://squareup.com/dashboard" data-tracking-value="Global Navigation: SQLogo" data-app-id="dashboard">
            <div class="navbar__logo-icon"></div>
          </a>
        </div>
        <div class="navbar__header--mobile__icon-back">
          <svg class="main-nav__back-icon" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
            <path d="M714.4 372.8c0-22.7-18.3-41.2-41.2-41.2H331.7l145-145c16-16 16-42 0-58.3l-39-39c-16-16-42-16-58.4 0L97.8 371c-8 8-12 18.4-12 29 0 10.5 4 21 12 29l281.5 281.6c16 16 42 16 58.4 0l39-39c16-16 16-42 0-58.3L331.6 469H673c22.7 0 41.2-18.6 41.2-41.3l.2-55z"></path>
          </svg>
        </div>
        <div class="navbar__merchant">
          <span class="navbar__merchant--title navbar-primary--visible-when-closed">duy.le@hoffee.vn</span>
          <span class="navbar__merchant--title navbar__merchant--title--drilldown navbar-primary--visible-when-opened"></span>
        </div>
        <div class="navbar-primary__icon-menu navbar__header--mobile__toggle navbar-primary--visible-when-closed">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 24">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 10h32v4H0v-4zM0 20h32v4H0v-4zM0 0h32v4H0V0z"></path>
          </svg>
        </div>
        <div class="navbar__header--mobile__icon-close navbar__header--mobile__toggle navbar-primary--visible-when-opened">
          <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <path d="M76.8 32.6L59.4 50l17.4 17.4c2.6 2.6 2.6 6.8 0 9.4-1.3 1.3-3 2-4.7 2-1.6 0-3.3-.7-4.6-2L50 59.4 32.6 76.8c-1.3 1.3-3 2-4.7 2-1.8 0-3.5-.7-4.8-2-2.6-2.6-2.6-6.8 0-9.4L40.6 50 23.2 32.6c-2.6-2.6-2.6-6.8 0-9.4 2.6-2.6 6.8-2.6 9.4 0L50 40.6l17.4-17.4c2.6-2.6 6.8-2.6 9.4 0 2.6 2.6 2.6 6.8 0 9.4z"></path>
          </svg>
        </div>
      </div>
      <div class="navbar-primary--sections--outer-wrapper navbar-primary--visible-when-opened">
        <div class="navbar-primary--sections--inner-wrapper">
          <div class="navbar-primary--sections">
            <div class="navbar__header navbar-primary--visible-when-opened">
              <div class="dashboard-navigation__notification-container dashboard-navigation__notification-container--in-nav">
                <article class="dashboard-navigation__notification dashboard-navigation__notification--in-nav">
                  <div class="navbar-primary__icon-notification"></div>
                  <div class="l-navbar-popout--anchor l-navbar-popout--is-closed" style="display: none;"></div>
                </article>
              </div>
              <div class="navbar__logo navbar__logo--desktop">
                <a href="https://squareup.com/dashboard" data-tracking-value="Global Navigation: Home" data-item-id="home" data-app-id="dashboard">
                  <div class="navbar__logo-icon"></div>
                </a>
              </div>
              <div class="navbar__merchant">duy.le@hoffee.vn</div>
              <a class="dashboard-navigation__toolbar-item" href="https://squareup.com/logout?return_to=/us/en/logout-redirect" data-tracking-value="Global Navigation Account Menu: Sign Out"
                data-item-id="logout" data-app-id="external">Sign Out</a>
            </div>
            <div class="navbar__section navbar__section--libraries">
              <div data-id="home" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                data-uuid="libraries-home" data-expanded="true">
                <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard" data-tracking-value="Global Navigation: Home"
                  data-app-id="dashboard" data-item-id="home">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Home</span>
                </a>
              </div>
              <div data-id="sales" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                data-uuid="libraries-sales" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/sales"
                  data-tracking-value="Global Navigation: Sales" data-app-id="dashboard" data-item-id="sales">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Sales</span>
                </a>
                <div class="navbar__section navbar__section--sales">
                  <div data-id="reports" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                    data-uuid="libraries-sales-reports" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/sales/reports"
                      data-tracking-value="Sales Navigation: Reports" data-app-id="dashboard" data-item-id="reports">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Reports</span>
                    </a>
                    <div class="navbar__section navbar__section--reports">
                      <div data-id="reports.sales_summary" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                        data-uuid="libraries-sales-reports-reports.sales_summary" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/sales-summary"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.sales_summary">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Sales Summary</span>
                        </a>
                      </div>
                      <div data-id="reports.sales_trends" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.sales_trends" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/sales-trends"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.sales_trends">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Sales Trends</span>
                        </a>
                      </div>
                      <div data-id="reports.payment_methods" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.payment_methods" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/payment-methods"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.payment_methods">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Payment Methods</span>
                        </a>
                      </div>
                      <div data-id="reports.item_sales" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.item_sales" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/item-sales"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.item_sales">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Item Sales</span>
                        </a>
                      </div>
                      <div data-id="reports.category_sales" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.category_sales" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/category-sales"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.category_sales">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Category Sales</span>
                        </a>
                      </div>
                      <div data-id="reports.employee_sales" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-sales-reports-reports.employee_sales"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/employee-sales"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.employee_sales">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Employee Sales</span>
                        </a>
                      </div>
                      <div data-id="reports.discounts" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.discounts" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/discounts"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.discounts">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Discounts</span>
                        </a>
                      </div>
                      <div data-id="reports.modifiers" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.modifiers" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/modifiers"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="reports.modifiers">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Modifier Sales</span>
                        </a>
                      </div>
                      <div data-id="reports.comps" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.comps" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/comps" data-tracking-value=""
                          data-app-id="dashboard" data-item-id="reports.comps">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Comps</span>
                        </a>
                      </div>
                      <div data-id="reports.voids" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.voids" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/voids" data-tracking-value=""
                          data-app-id="dashboard" data-item-id="reports.voids">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Voids</span>
                        </a>
                      </div>
                      <div data-id="reports.taxes" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-sales-reports-reports.taxes" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/reports/taxes" data-tracking-value=""
                          data-app-id="dashboard" data-item-id="reports.taxes">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Taxes</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div data-id="transactions" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="libraries-sales-transactions" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/transactions" data-tracking-value="Sales Navigation: Transactions"
                      data-app-id="dashboard" data-item-id="transactions">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Transactions</span>
                    </a>
                  </div>
                  <div data-id="activity.disputes" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="libraries-sales-activity.disputes" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/disputes" data-tracking-value="Sales Navigation: Sales.Nav.Disputes"
                      data-app-id="dashboard" data-item-id="activity.disputes">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Disputes</span>
                    </a>
                  </div>
                  <div data-id="cash_drawers" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-sales-cash_drawers"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/sales/cash-drawers" data-tracking-value="Sales Navigation: Cash Drawers"
                      data-app-id="dashboard" data-item-id="cash_drawers">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Cash Drawers</span>
                    </a>
                  </div>
                </div>
              </div>
              <div data-id="items" class="dashboard-navigation__navbar-primary-item   navbar-item-is-active" data-uuid="libraries-items"
                data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/items"
                  data-tracking-value="Global Navigation: Items" data-app-id="dashboard" data-item-id="items">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Items</span>
                </a>
                <div class="navbar__section navbar__section--items">
                  <div data-id="item_library" class="dashboard-navigation__navbar-primary-item   navbar-item-is-active" data-uuid="libraries-items-item_library"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/library" data-tracking-value="Items Navigation: Library"
                      data-app-id="dashboard" data-item-id="item_library">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Item Library</span>
                    </a>
                  </div>
                  <div data-id="item_modifiers" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-item_modifiers"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/modifiers" data-tracking-value="Items Navigation: Modifiers"
                      data-app-id="dashboard" data-item-id="item_modifiers">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Modifiers</span>
                    </a>
                  </div>
                  <div data-id="items.categories" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-items.categories"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/categories" data-tracking-value="Items Navigation: Categories"
                      data-app-id="dashboard" data-item-id="items.categories">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Categories</span>
                    </a>
                  </div>
                  <div data-id="item_discounts" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-item_discounts"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/discounts" data-tracking-value="Items Navigation: Discounts"
                      data-app-id="dashboard" data-item-id="item_discounts">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Discounts</span>
                    </a>
                  </div>
                  <div data-id="item_taxes" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-item_taxes" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/taxes" data-tracking-value="Items Navigation: Taxes"
                      data-app-id="dashboard" data-item-id="item_taxes">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Taxes</span>
                    </a>
                  </div>
                  <div data-id="items.settings" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-items.settings"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/items/settings"
                      data-tracking-value="Items Navigation: Items.Nav.Settings" data-app-id="dashboard" data-item-id="items.settings">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Settings</span>
                    </a>
                    <div class="navbar__section navbar__section--items.settings">
                      <div data-id="items.settings.dining_options" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-items.settings-items.settings.dining_options"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/settings/dining-options"
                          data-tracking-value="Items Navigation: Dining Options" data-app-id="dashboard" data-item-id="items.settings.dining_options">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Dining Options</span>
                        </a>
                      </div>
                      <div data-id="items.settings.comp_void_reasons" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-items.settings-items.settings.comp_void_reasons"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/settings/comp-void-reasons"
                          data-tracking-value="Items Navigation: Comp Void Reasons" data-app-id="dashboard" data-item-id="items.settings.comp_void_reasons">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Comp and Void</span>
                        </a>
                      </div>
                      <div data-id="items.settings.inventory" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-items-items.settings-items.settings.inventory"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/items/settings/inventory"
                          data-tracking-value="Items Navigation: Items.Nav.Inventory" data-app-id="dashboard" data-item-id="items.settings.inventory">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Inventory</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div data-id="employees" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                data-uuid="libraries-employees" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/employees"
                  data-tracking-value="Global Navigation: Employees" data-app-id="dashboard" data-item-id="employees">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Employees</span>
                </a>
                <div class="navbar__section navbar__section--employees">
                  <div data-id="employee_roles" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                    data-uuid="libraries-employees-employee_roles" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/employees/permissions/roles"
                      data-tracking-value="Employees Navigation: Permission Roles" data-app-id="dashboard" data-item-id="employee_roles">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Permissions</span>
                    </a>
                  </div>
                </div>
              </div>
              <div data-id="customers" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                data-uuid="libraries-customers" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/customers"
                  data-tracking-value="Global Navigation: Customers" data-app-id="dashboard" data-item-id="customers">
                  <div class="navbar-primary__icon-badge navbar-primary__icon-badge-no-count" data-badge-id="customers" data-mobilized="true"
                    data-endpoint="" data-method="">0</div>
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Customers</span>
                </a>
                <div class="navbar__section navbar__section--customers">
                  <div data-id="customer_list" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized"
                    data-uuid="libraries-customers-customer_list" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/customers/directory" data-tracking-value="Customers Navigation: List"
                      data-app-id="dashboard" data-item-id="customer_list">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Directory</span>
                    </a>
                  </div>
                  <div data-id="feedback" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="libraries-customers-feedback" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/customers/feedback" data-tracking-value="Customers Navigation: Feedback"
                      data-app-id="dashboard" data-item-id="feedback">
                      <div class="navbar-primary__icon-badge navbar-primary__icon-badge-no-count" data-badge-id="feedback" data-mobilized="true"
                        data-endpoint="/api/v1/dialogue/unread-count" data-method="POST">0</div>
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Feedback</span>
                    </a>
                  </div>
                  <div data-id="customers.overview" class="dashboard-navigation__navbar-primary-item  " data-uuid="libraries-customers-customers.overview"
                    data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/customers/overview" data-tracking-value="Customers Navigation: Overview"
                      data-app-id="dashboard" data-item-id="customers.overview">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Insights</span>
                    </a>
                  </div>
                  <div data-id="customers.settings" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="libraries-customers-customers.settings" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/customers/settings"
                      data-tracking-value="" data-app-id="dashboard" data-item-id="customers.settings">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Settings</span>
                    </a>
                    <div class="navbar__section navbar__section--customers.settings">
                      <div data-id="customers.settings.profiles" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-customers-customers.settings-customers.settings.profiles" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/customers/settings/profiles"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="customers.settings.profiles">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Customer Profiles</span>
                        </a>
                      </div>
                      <div data-id="customers.settings.feedback" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="libraries-customers-customers.settings-customers.settings.feedback" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/customers/settings/feedback"
                          data-tracking-value="" data-app-id="dashboard" data-item-id="customers.settings.feedback">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Feedback</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="navbar__section navbar__section--applications">
              <div data-id="apps" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                data-uuid="applications-apps" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/apps"
                  data-tracking-value="Global Navigation: Apps" data-app-id="dashboard" data-item-id="apps">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Apps</span>
                </a>
                <div class="navbar__section navbar__section--apps">
                  <div data-id="apps.index" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="applications-apps-apps.index" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/apps" data-tracking-value="Global Navigation: Apps"
                      data-app-id="dashboard" data-item-id="apps.index">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">App Marketplace</span>
                    </a>
                  </div>
                  <div data-id="apps.my_apps" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="applications-apps-apps.my_apps" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/apps/my-apps" data-tracking-value="Global Navigation: Nav.Apps.My Apps"
                      data-app-id="dashboard" data-item-id="apps.my_apps">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">My Apps</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="navbar__section navbar__section--aux">
              <div data-id="settings" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                data-uuid="aux-settings" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/account"
                  data-tracking-value="Global Navigation Account Menu: Account Settings" data-app-id="dashboard" data-item-id="settings">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Account &amp; Settings</span>
                </a>
                <div class="navbar__section navbar__section--settings">
                  <div data-id="account" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="aux-settings-account" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/items/library#"
                      data-tracking-value="" data-app-id="dashboard" data-item-id="account">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Account</span>
                    </a>
                    <div class="navbar__section navbar__section--account">
                      <div data-id="user_settings.index" class="dashboard-navigation__navbar-primary-item  " data-uuid="aux-settings-account-user_settings.index"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/account" data-tracking-value="Settings Navigation: Account"
                          data-app-id="dashboard" data-item-id="user_settings.index">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Personal Information</span>
                        </a>
                      </div>
                      <div data-id="business.email_notifications" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="aux-settings-account-business.email_notifications" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/business/email-notifications"
                          data-tracking-value="Settings Navigation: Email Notifications" data-app-id="dashboard" data-item-id="business.email_notifications">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Email Notifications</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div data-id="business" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                    data-uuid="aux-settings-business" data-expanded="">
                    <a class="dashboard-navigation__navbar-primary-item-action dashboard-navigation__navbar-primary-item-action--parent" href="https://squareup.com/dashboard/items/library#"
                      data-tracking-value="" data-app-id="dashboard" data-item-id="business">
                      <span class="dashboard-navigation__navbar-primary-item-action__label">Business</span>
                    </a>
                    <div class="navbar__section navbar__section--business">
                      <div data-id="locations" class="dashboard-navigation__navbar-primary-item  " data-uuid="aux-settings-business-locations"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/locations" data-tracking-value="Global Navigation: Locations"
                          data-app-id="dashboard" data-item-id="locations">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Locations</span>
                        </a>
                      </div>
                      <div data-id="pricing" class="dashboard-navigation__navbar-primary-item  " data-uuid="aux-settings-business-pricing" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/account/pricing" data-tracking-value="Settings Navigation: Pricing"
                          data-app-id="dashboard" data-item-id="pricing">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Pricing &amp; Subscriptions</span>
                        </a>
                      </div>
                      <div data-id="business.receipt" class="dashboard-navigation__navbar-primary-item  " data-uuid="aux-settings-business-business.receipt"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/business/receipt" data-tracking-value="Settings Navigation: Receipt"
                          data-app-id="dashboard" data-item-id="business.receipt">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Receipt</span>
                        </a>
                      </div>
                      <div data-id="business.devices" class="dashboard-navigation__navbar-primary-item  " data-uuid="aux-settings-business-business.devices"
                        data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/business/devices" data-tracking-value=""
                          data-app-id="dashboard" data-item-id="business.devices">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Devices</span>
                        </a>
                      </div>
                      <div data-id="business.information" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                        data-uuid="aux-settings-business-business.information" data-expanded="">
                        <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/dashboard/business/square-secure"
                          data-tracking-value="Settings Navigation: Business.Nav.Information" data-app-id="dashboard" data-item-id="business.information">
                          <span class="dashboard-navigation__navbar-primary-item-action__label">Square Secure</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div data-id="help" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                data-uuid="aux-help" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/help" data-tracking-value="Global Navigation Account Menu: Help Center"
                  data-app-id="/dashboard|payroll/" data-item-id="help" target="_blank">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Support Center</span>
                </a>
              </div>
              <div data-id="logout" class="dashboard-navigation__navbar-primary-item dashboard-navigation__navbar-primary-item--mobilized "
                data-uuid="aux-logout" data-expanded="">
                <a class="dashboard-navigation__navbar-primary-item-action " href="https://squareup.com/logout?return_to=/us/en/logout-redirect"
                  data-tracking-value="Global Navigation Account Menu: Sign Out" data-app-id="external" data-item-id="logout">
                  <span class="dashboard-navigation__navbar-primary-item-action__label">Sign Out</span>
                </a>
              </div>
            </div>
            <div class="navbar__footer--mobile">
              <a data-item-id="view-full-site" href="https://squareup.com/dashboard/items/library#" data-tracking-value="Global Navigation: View Full Site">View Full Site</a>&nbsp;•&nbsp;
              <a data-item-id="logout" href="https://squareup.com/logout?return_to=/us/en/logout-redirect" data-tracking-value="Global Navigation Account Menu: Sign Out">Sign Out</a>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar__logo navbar__logo--closed">
        <div class="navbar__logo-icon"></div>
      </div>
      <div class="l-navbar-primary__icons">
        <div class="navbar-primary__icon navbar-primary__icon-menu navbar-primary--visible-when-closed">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 24 14" enable-background="new 0 0 24 14" xml:space="preserve">
            <g>
              <rect fill="#FFFFFF" width="24" height="2"></rect>
              <rect y="12" fill="#FFFFFF" width="24" height="2"></rect>
              <rect y="6" fill="#FFFFFF" width="24" height="2"></rect>
            </g>
          </svg>
        </div>
        <div class="navbar-primary__icon dashboard-navigation__notification-container">
          <article class="dashboard-navigation__notification ">
            <div class="navbar-primary__icon-notification"></div>
            <div class="l-navbar-popout--anchor l-navbar-popout--is-closed" style="display: none;"></div>
          </article>
        </div>
        <div class="navbar-primary__icon navbar-primary__icon-badge navbar-primary--visible-when-closed navbar-primary__icon-badge-no-count"
          data-badge-id="total">0</div>
      </div>
    </div>
  </div>

  <div id="dashboard-container" class="ember-application">

    <div id="ember1225" class="ember-view">
      <div id="sq-app-container" class="l-viewport-app ember-view">
        <!---->
        <div class="page-layout sq-lazy-list__full-height-parent">
          <div id="ember4240" class="title-header title-header--nav-right ember-view">
            <div id="ember4241" class="title-header__title title-header--nav-right__title ember-view">Items
            </div>

            <div class="title-header__navigation">
              <div id="ember4242" class="ember-view">

                <a href="https://squareup.com/dashboard/items/library" id="ember4309" class="l-pull-left navbar-secondary-item navbar-secondary-item--right navbar-item-is-active ember-view">
                  Item Library
                  <!---->
                </a>
                <a href="https://squareup.com/dashboard/items/modifiers" id="ember4311" class="l-pull-left navbar-secondary-item navbar-secondary-item--right ember-view">
                  Modifiers
                  <!---->
                </a>
                <a href="https://squareup.com/dashboard/items/categories" id="ember4330" class="l-pull-left navbar-secondary-item navbar-secondary-item--right ember-view">
                  Categories
                  <!---->
                </a>
                <a href="https://squareup.com/dashboard/items/discounts" id="ember4340" class="l-pull-left navbar-secondary-item navbar-secondary-item--right ember-view">
                  Discounts
                  <!---->
                </a>
                <a href="https://squareup.com/dashboard/items/taxes" id="ember4353" class="l-pull-left navbar-secondary-item navbar-secondary-item--right ember-view">
                  Taxes
                  <!---->
                </a>
                <a href="https://squareup.com/dashboard/items/settings" id="ember4366" class="l-pull-left navbar-secondary-item navbar-secondary-item--right ember-view">
                  Settings
                  <!---->
                </a>
              </div>

            </div>
          </div>
          <div id="ember4243" class="loading loading--fixed dashboard-navigation__fixed-top-element dashboard-navigation__fixed-left-element ember-view">
            <i class="loading--indicator "></i>
          </div>

          <!---->
          <!---->

          <!---->
          <div class="filter-bar">
            <div class="filter-bar__filters">
              <div class="filter-bar__item">
                <div id="ember4249" class="ember-view">
                  <div id="ember4250" class="dropdown ember-view">
                    <button tabindex="0" id="ember4251" class="button button--pill caret-down dropdown__trigger ember-view">
                      All Categories
                    </button>

                    <div id="ember4252" class="popover--fly-down pointer--top pointer--align-left popover--filter  popover dropdown__popover ember-view">
                      <div id="ember4253" class="option-set ember-view">
                        <div class="l-items-filter-filter-content">

                          <div id="ember4254" class="l-items-category-filter-search input-icon input-search input-search--fluid ember-view">
                            <input type="text" id="ember4255" class="  ember-text-field input input-icon--search__input input-icon--search__input-clear ember-view">
                            <i class="input-icon--search__icon"></i>
                            <i class="input-icon--search__icon-clear l-hide" data-ember-action="" data-ember-action-4256="4256"></i>
                          </div>

                          <div data-ember-action="" data-ember-action-4257="4257">
                            <div id="ember4258" class="popover-list__item--with-top-border popover-list__item--add-bottom-border option option-is-active ember-view">
                              <div class="radio radio-is-active ">
                                <input type="radio" value="false" class="radio--input" name="option-set--ember4253">
                                <i class="radio--mark"></i>
                              </div>
                              <div class="radio-row">
                                All Categories
                              </div>

                            </div>
                          </div>

                          <div id="ember4259" class="sq-lazy-list__container ember-view" style="max-height: 96px; min-height: 96px;">
                            <div style="
      height: 96px;
      margin-top: 0px;
      margin-bottom: 0px;
    " class="sq-lazy-list__scroller  ">
                              <div style="transform: translateY(0px); -webkit-transform: translateY(0px);" class="sq-lazy-list__item">
                                <div data-ember-action="" data-ember-action-4377="4377">
                                  <div value="&lt;dashboard/models/menu_category:ember4379&gt;" id="ember4378" class="popover-list__item--with-top-border l-items-category-filter__item option ember-view">
                                    <div class="radio  ">
                                      <input type="radio" value="&lt;dashboard/models/menu_category:ember4379&gt;" class="radio--input" name="option-set--ember4259">
                                      <i class="radio--mark"></i>
                                    </div>
                                    <div class="radio-row">
                                      Cafe
                                    </div>

                                  </div>
                                </div>

                              </div>
                              <div style="transform: translateY(0px); -webkit-transform: translateY(0px);" class="sq-lazy-list__item">
                                <div data-ember-action="" data-ember-action-4380="4380">
                                  <div value="&lt;dashboard/models/menu_category:ember4382&gt;" id="ember4381" class="popover-list__item--with-top-border l-items-category-filter__item option ember-view">
                                    <div class="radio  ">
                                      <input type="radio" value="&lt;dashboard/models/menu_category:ember4382&gt;" class="radio--input" name="option-set--ember4259">
                                      <i class="radio--mark"></i>
                                    </div>
                                    <div class="radio-row">
                                      Cfg
                                    </div>

                                  </div>
                                </div>

                              </div>
                            </div>
                            <!---->
                            <!---->
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <!---->
              <div class="filter-bar__item">
                <div id="ember4260" class="dropdown ember-view">
                  <button tabindex="0" id="ember4261" class="button button--pill caret-down dropdown__trigger ember-view">
                    All Inventory
                  </button>

                  <div id="ember4262" class="popover--fly-down popover--filter pointer--top pointer--align-left popover-list popover dropdown__popover ember-view">
                    <div id="ember4263" class="option-set ember-view">
                      <div id="ember4264" class="popover-list__item option option-is-active ember-view">
                        <div class="radio radio-is-active ">
                          <input type="radio" value="false" class="radio--input" name="option-set--ember4263">
                          <i class="radio--mark"></i>
                        </div>
                        <div class="radio-row">
                          All Inventory
                        </div>

                      </div>
                      <div value="[object Object]" id="ember4266" class="popover-list__item option ember-view">
                        <div class="radio  ">
                          <input type="radio" value="[object Object]" class="radio--input" name="option-set--ember4263">
                          <i class="radio--mark"></i>
                        </div>
                        <div class="radio-row">
                          Low Stock Alert
                        </div>

                      </div>
                      <div value="[object Object]" id="ember4268" class="popover-list__item option ember-view">
                        <div class="radio  ">
                          <input type="radio" value="[object Object]" class="radio--input" name="option-set--ember4263">
                          <i class="radio--mark"></i>
                        </div>
                        <div class="radio-row">
                          Out of Stock Alert
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="ember4269" class="filter-bar__item input-icon input-search ember-view">
                <input type="text" id="ember4270" class="  ember-text-field input input-icon--search__input input-icon--search__input-clear ember-view">
                <i class="input-icon--search__icon"></i>
                <i class="input-icon--search__icon-clear l-hide" data-ember-action="" data-ember-action-4271="4271"></i>
              </div>
            </div>

            <div class="filter-bar__actions">
              <button class="button button--secondary filter-bar__item" data-ember-action="" data-ember-action-4272="4272">
                Import
              </button>

              <button class="button button--secondary filter-bar__item" data-ember-action="" data-ember-action-4273="4273">
                Export
              </button>

              <button class="button button--primary filter-bar__item" data-ember-action="" data-ember-action-4274="4274">
                Create Item
              </button>
            </div>
          </div>

          <div id="ember4279" class="ember-view">
            <div id="ember4280" class="super-table-viewport l-items-table__table-body ember-view" style="transform: translateY(0px); height: 537px;">
              <div style="height: 100%" class="table table--flex table--flex--selectable l-item-table">
                <div id="ember4287" class="sq-lazy-list__container ember-view" style="max-height: 196px; min-height: 98px;">
                  <div style="
      height: 147px;
      margin-top: 49px;
      margin-bottom: 0px;
    " class="sq-lazy-list__scroller  ">
                    <div style="transform: translateY(0px); -webkit-transform: translateY(0px);" class="sq-lazy-list__item">
                      <div class="table-row table-row--selectable" data-ember-action="" data-ember-action-4388="4388">
                        <div class="l-items-table__caret-column sq-lazy-list__fixed-x table-cell table-cell--flex-col-action-caret" data-ember-action=""
                          data-ember-action-4389="4389" style="transform: translateX(0px);">
                          <!---->
                        </div>
                        <div class="table-cell super-table__fixed-column sq-lazy-list__fixed-x table-cell--link   l-items-table__name-column" style="transform: translateX(0px);">
                          1 La
                        </div>
                        <div class="table-cell    l-items-table__category-column">

                        </div>
                        <div class="table-cell   type-align-right l-items-table__in-stock-column">
                          99
                        </div>
                        <div class="table-cell   type-align-right l-items-table__price-column">
                          ₫129,000
                        </div>
                      </div>

                    </div>
                    <div style="transform: translateY(0px); -webkit-transform: translateY(0px);" class="sq-lazy-list__item">
                      <div class="table-row table-row--selectable" data-ember-action="" data-ember-action-4393="4393">
                        <div class="l-items-table__caret-column sq-lazy-list__fixed-x table-cell table-cell--flex-col-action-caret" data-ember-action=""
                          data-ember-action-4394="4394" style="transform: translateX(0px);">
                          <!---->
                        </div>
                        <div class="table-cell super-table__fixed-column sq-lazy-list__fixed-x table-cell--link   l-items-table__name-column" style="transform: translateX(0px);">
                          2 La
                        </div>
                        <div class="table-cell    l-items-table__category-column">

                        </div>
                        <div class="table-cell   type-align-right l-items-table__in-stock-column">
                          99
                        </div>
                        <div class="table-cell   type-align-right l-items-table__price-column">
                          ₫149,000
                        </div>
                      </div>

                    </div>
                    <div style="transform: translateY(0px); -webkit-transform: translateY(0px);" class="sq-lazy-list__item">
                      <div class="table-row table-row--selectable" data-ember-action="" data-ember-action-4396="4396">
                        <div class="l-items-table__caret-column sq-lazy-list__fixed-x table-cell table-cell--flex-col-action-caret" data-ember-action=""
                          data-ember-action-4397="4397" style="transform: translateX(0px);">
                          <!---->
                        </div>
                        <div class="table-cell super-table__fixed-column sq-lazy-list__fixed-x table-cell--link   l-items-table__name-column" style="transform: translateX(0px);">
                          Bánh
                        </div>
                        <div class="table-cell    l-items-table__category-column">
                          Cafe
                        </div>
                        <div class="table-cell   type-align-right l-items-table__in-stock-column">
                          -
                        </div>
                        <div class="table-cell   type-align-right l-items-table__price-column">
                          ₫19,000
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="sq-lazy-list__header" style="transform: translateY(0px); height: 49px;">
                    <div class="table-row table-header super-table__header">
                      <div class="table-cell-header l-items-table__caret-column table-cell-header--flex-col-action-caret sq-lazy-list__fixed-x"
                        style="transform: translateX(0px);"></div>
                      <div class="table-cell-header super-table__fixed-column super-table-cell-header sq-lazy-list__fixed-x  l-items-table__name-column"
                        style="transform: translateX(0px);">
                        Product
                        <!---->
                      </div>
                      <div class="table-cell-header   l-items-table__category-column">
                        Category
                        <!---->
                      </div>
                      <div class="table-cell-header  type-align-right l-items-table__in-stock-column">
                        In Stock
                        <!---->
                      </div>
                      <div class="table-cell-header  type-align-right l-items-table__price-column">
                        Price
                        <!---->
                      </div>
                    </div>

                  </div>
                  <!---->
                </div>
                <div id="ember4294" class="catalog__column-dropdown ember-view">
                  <div id="ember4295" class="dropdown ember-view">
                    <button tabindex="0" id="ember4296" class="button plus-button dropdown__trigger ember-view">
                      <i class="icon-plus-small plus-button__icon"></i>

                    </button>
                    <div id="ember4297" class="popover-list popover--fly-down pointer--top pointer--align-right popover--align-right popover dropdown__popover ember-view">
                      <div id="ember4298" class="option-set ember-view">
                        <!---->
                        <div value="[object Object]" id="ember4300" class="option popover-list__item option ember-view">
                          <div class="checkbox ">
                            <input type="checkbox" class="checkbox__input" name="option-set--ember4298">
                            <i class="icon-checkmark checkbox__checkmark"></i>
                          </div>
                          SKU

                        </div>
                        <div value="[object Object]" id="ember4301" class="option popover-list__item option option-is-active ember-view">
                          <div class="checkbox checkbox-is-active checkbox--is-checked">
                            <input type="checkbox" class="checkbox__input" name="option-set--ember4298">
                            <i class="icon-checkmark checkbox__checkmark"></i>
                          </div>
                          Category

                        </div>
                        <div value="[object Object]" id="ember4303" class="option popover-list__item option ember-view">
                          <div class="checkbox ">
                            <input type="checkbox" class="checkbox__input" name="option-set--ember4298">
                            <i class="icon-checkmark checkbox__checkmark"></i>
                          </div>
                          Locations

                        </div>
                        <div value="[object Object]" id="ember4304" class="option popover-list__item option option-is-active ember-view">
                          <div class="checkbox checkbox-is-active checkbox--is-checked">
                            <input type="checkbox" class="checkbox__input" name="option-set--ember4298">
                            <i class="icon-checkmark checkbox__checkmark"></i>
                          </div>
                          In Stock

                        </div>
                        <div value="[object Object]" id="ember4305" class="option popover-list__item option option-is-active ember-view">
                          <div class="checkbox checkbox-is-active checkbox--is-checked">
                            <input type="checkbox" class="checkbox__input" name="option-set--ember4298">
                            <i class="icon-checkmark checkbox__checkmark"></i>
                          </div>
                          Price

                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

        <!---->

        <div id="ember4307" class="  flash-message ember-view">
          <div class="flash-message__wrapper ">
            <i class="flash-message__icon "></i>
            <div class="flash-message__body">

            </div>
          </div>
        </div>


        <!---->
        <!---->
        <!---->
        <div id="ember1265" class="ember-view">
          <!---->
        </div>

        <div id="ember1268" class="sq-load-perf-beacon ember-view"></div>
      </div>
    </div>
  </div>

  <div id="current-user-data" data-value="{&quot;token&quot;:&quot;8CQRMH1HJGVEW&quot;,&quot;name&quot;:&quot;duy.le@hoffee.vn&quot;,&quot;business_type&quot;:null,&quot;country_code&quot;:&quot;VN&quot;,&quot;currency_code&quot;:&quot;VND&quot;,&quot;email&quot;:&quot;8cqrmh1hjgvew@merchant-token.squareup.com&quot;,&quot;language_code&quot;:&quot;en&quot;,&quot;parent_merchant&quot;:null,&quot;merchant_profile&quot;:{&quot;published&quot;:false,&quot;name&quot;:&quot;duy.le@hoffee.vn&quot;,&quot;slug&quot;:&quot;&quot;},&quot;subunits&quot;:[{&quot;nickname&quot;:&quot;duy.le@hoffee.vn&quot;,&quot;token&quot;:&quot;22198DE55AB2W&quot;}],&quot;merchant_subunits&quot;:[{&quot;nickname&quot;:&quot;duy.le@hoffee.vn&quot;,&quot;token&quot;:&quot;22198DE55AB2W&quot;}],&quot;first_payment_date&quot;:null,&quot;person_token&quot;:&quot;person:IVPGD7TBILDCLBNF&quot;,&quot;subscription_feature_status&quot;:[],&quot;authorized_unit_tokens&quot;:[&quot;22198DE55AB2W&quot;],&quot;can_skip_signatures_for_small_payments&quot;:true,&quot;can_refund_in_app&quot;:true,&quot;can_bank_link_in_app_android&quot;:true,&quot;can_bank_link_post_signup_android&quot;:true,&quot;can_use_in_app_help_center&quot;:true,&quot;can_view_sparse_tabs&quot;:true,&quot;can_use_item_autocomplete&quot;:true,&quot;can_buyer_purchase_gift_cards&quot;:true,&quot;can_preview_show_receipts_from_beemo_data_rate&quot;:true,&quot;can_use_web_storefronts&quot;:true,&quot;can_verify_with_single_deposit&quot;:true,&quot;can_use_item_embedding&quot;:true,&quot;can_use_analytics&quot;:true,&quot;can_validate_addresses_in_realtime&quot;:true,&quot;can_use_promo_codes&quot;:true,&quot;can_use_orders_in_new_dashboard&quot;:true,&quot;can_view_japan_amex_support_notification&quot;:true,&quot;can_receive_csp_headers&quot;:true,&quot;can_edit_current_1099k_information&quot;:true,&quot;can_see_historical_1099k_reports&quot;:true,&quot;can_use_paper_signature&quot;:true,&quot;can_use_payroll_employer&quot;:true,&quot;can_use_receipts_feedback&quot;:true,&quot;can_refer_a_friend&quot;:true,&quot;can_use_multiple_images&quot;:true,&quot;can_use_inventory_management&quot;:true,&quot;can_opt_in_to_store_and_forward_payments&quot;:true,&quot;can_use_csv_import_in_new_dashboard&quot;:true,&quot;can_issue_partial_refunds&quot;:true,&quot;can_use_event_based_refunds&quot;:true,&quot;can_use_inventory_v2&quot;:true,&quot;can_use_email_communication&quot;:true,&quot;can_use_open_tickets&quot;:true,&quot;can_use_split_tender&quot;:true,&quot;can_preview_program_order_beta&quot;:true,&quot;can_preview_program_register_beta&quot;:true,&quot;can_view_swedish_rounding&quot;:true,&quot;can_use_setup_tab&quot;:true,&quot;can_use_card_associated_coupons&quot;:true,&quot;can_use_menu_embed&quot;:true,&quot;can_subscribe_to_feedback_premium&quot;:true,&quot;can_refund_in_app_without_card_number&quot;:true,&quot;can_use_bills_api_for_single_tender&quot;:true,&quot;can_see_customers_overview&quot;:true,&quot;can_auto_capture_payments&quot;:true,&quot;can_use_gift_cards_v2&quot;:true,&quot;can_use_receipt_editor&quot;:true,&quot;can_show_unsuccessful_payments_count_in_sales_summary_email&quot;:true,&quot;can_see_transaction_status_report&quot;:true,&quot;can_swipe_to_create_open_ticket_with_name&quot;:true,&quot;can_appointments_in_ios&quot;:true,&quot;can_use_customer_list&quot;:true,&quot;can_preview_program_dashboard_beta&quot;:true,&quot;can_sync_cash_drawer_shifts_down&quot;:true,&quot;can_use_feedback_coupons&quot;:true,&quot;can_view_android_printing_available_message&quot;:true,&quot;can_use_dashboard_cash_drawer_reports&quot;:true,&quot;can_use_bills_api_for_single_tender_cash_other&quot;:true,&quot;can_preview_program_appointments_beta&quot;:true,&quot;can_use_explicitly_linked_bank_account&quot;:true,&quot;can_use_bills_api_for_store_and_forward&quot;:true,&quot;can_use_open_tickets_android&quot;:true,&quot;can_use_gift_card_reporting_polish&quot;:true,&quot;can_use_payroll_tax_forms&quot;:true,&quot;can_see_name_on_card&quot;:true,&quot;can_use_sites_v2&quot;:true,&quot;can_preview_program_chipreader_beta&quot;:true,&quot;can_use_revamped_xyz_reports&quot;:true,&quot;can_enable_ios8_nscache_crash_fix&quot;:true,&quot;can_subscribe_to_customers_pro&quot;:true,&quot;can_preview_program_display_beta&quot;:true,&quot;can_see_bills&quot;:true,&quot;can_preview_program_pulse_beta&quot;:true,&quot;can_see_dashboard_nav_refresh&quot;:true,&quot;can_use_ios_cross_app_api&quot;:true,&quot;can_see_refer_a_friend_in_app_android&quot;:true,&quot;can_show_gen2_deprecation_warning_in_app&quot;:true,&quot;can_release_refunded_holds_with_ledger&quot;:true,&quot;can_use_customer_list_in_ios&quot;:true,&quot;can_use_instant_deposits_v2&quot;:true,&quot;can_use_bills_api_for_single_tender_cash_other_on_ios&quot;:true,&quot;can_use_bills_api_for_store_and_forward_on_ios&quot;:true,&quot;can_use_employee_filtering_on_xyz_reports&quot;:true,&quot;can_see_split_deposit&quot;:true,&quot;can_use_bills_api_for_single_tender_on_ios&quot;:true,&quot;can_use_dining_options&quot;:true,&quot;can_use_navigation_service&quot;:true,&quot;can_see_refer_a_friend_in_app_ios&quot;:true,&quot;can_sync_cash_drawer_shifts_up_via_queue&quot;:true,&quot;can_use_dashboard_report_builder&quot;:true,&quot;can_use_dashboard_time_intervals&quot;:true,&quot;can_use_customer_list_in_android&quot;:true,&quot;can_use_android_printer_stations&quot;:true,&quot;can_use_payroll_otdt_calculations&quot;:true,&quot;can_use_lombard_for_async_payment_events_on_ios&quot;:true,&quot;can_use_mobile_invoices_with_modifiers&quot;:true,&quot;can_view_referrals_in_deposit_email&quot;:true,&quot;can_use_open_tickets_mobile_android&quot;:true,&quot;can_use_open_tickets_mobile_ios&quot;:true,&quot;can_use_customers_rewards&quot;:true,&quot;can_use_android_reports_applet&quot;:true,&quot;can_use_multiunit_punch_cards&quot;:true,&quot;can_view_punch_card_transactions&quot;:true,&quot;can_use_customer_list_applet_in_android&quot;:true,&quot;can_use_customer_list_applet_in_ios&quot;:true,&quot;can_use_android_barcode_scanning&quot;:true,&quot;can_use_cancel_buyer_flow&quot;:true,&quot;can_use_r12_wirelessly&quot;:true,&quot;can_use_custom_report_transaction_search&quot;:true,&quot;can_link_card_on_file&quot;:true,&quot;can_use_conditional_taxes&quot;:true,&quot;can_use_dashboard_display_by_location&quot;:true,&quot;can_use_item_based_coupons&quot;:true,&quot;can_use_printing_mobile_ios&quot;:true,&quot;can_canadian_multiunit&quot;:true,&quot;can_employee_filter_bills_list&quot;:true,&quot;can_use_split_ticket_ios&quot;:true,&quot;can_call_ledger_for_release_refund&quot;:true,&quot;can_use_employee_timecards_create_delete&quot;:true,&quot;can_appointments_ios_app_launch&quot;:true,&quot;can_use_australian_gross_sales&quot;:true,&quot;can_transfer_open_tickets&quot;:true,&quot;can_use_embedded_locations&quot;:true,&quot;can_use_employee_filtering_for_open_tickets&quot;:true,&quot;can_use_employee_filtering_for_paper_signature&quot;:true,&quot;can_see_dashboard_expected_in_drawer_permission&quot;:true,&quot;can_send_coupon_notifications&quot;:true,&quot;can_use_split_tickets_android&quot;:true,&quot;can_use_voids_ios&quot;:true,&quot;can_skip_receipt_screen&quot;:true,&quot;can_use_android_employee_management&quot;:true,&quot;can_use_text_tiles&quot;:true,&quot;can_see_dashboard_comp_report&quot;:true,&quot;can_see_dashboard_void_report&quot;:true,&quot;can_use_customer_list_in_transactions&quot;:true,&quot;can_use_gift_cards_v2_in_jp&quot;:true,&quot;can_use_custom_reports_for_client_analytics_overview&quot;:true,&quot;can_use_paper_signature_android&quot;:true,&quot;can_use_card_reader_learn_more_ios&quot;:true,&quot;can_allow_mobile_cashier_to_toggle_offline_mode&quot;:true,&quot;can_preview_program_retail_beta&quot;:true,&quot;can_use_customer_list_applet_in_android_mobile&quot;:true,&quot;can_use_customer_list_applet_in_ios_mobile&quot;:true,&quot;can_use_customer_list_in_android_mobile&quot;:true,&quot;can_use_customer_list_in_ios_mobile&quot;:true,&quot;can_see_new_employee_paywall&quot;:true,&quot;can_use_receipt_beemo_v3&quot;:true,&quot;can_view_dashboard_app_first_run_abtest&quot;:true,&quot;can_reduce_printing_waste_ios&quot;:true,&quot;can_send_receipts_with_list_of_coupons&quot;:true,&quot;can_use_dining_options_ios_mobile&quot;:true,&quot;can_use_item_based_coupons_android&quot;:true,&quot;can_use_merge_ticket_ios&quot;:true,&quot;can_show_o1_jp_deprecation_warning_in_app&quot;:true,&quot;can_view_dashboard_app_education_banners_abtest&quot;:true,&quot;can_see_dashboard_devices_new_version&quot;:true,&quot;can_show_bank_linking_nags_in_app&quot;:true,&quot;can_use_comps_ios&quot;:true,&quot;can_use_mobile_invoices_with_discounts&quot;:true,&quot;can_see_discount_and_comp_name&quot;:true,&quot;can_see_payroll_register_learn_more_ios&quot;:true,&quot;can_use_safetynet&quot;:true,&quot;can_use_void_comp_android&quot;:true,&quot;can_use_customer_list_activity_list_in_android&quot;:true,&quot;can_use_customer_list_activity_list_in_ios&quot;:true,&quot;can_show_referral_in_receipt&quot;:true,&quot;can_employee_cancel_transaction&quot;:true,&quot;can_loyalty_2&quot;:true,&quot;can_see_new_employee_onboarding&quot;:true,&quot;can_use_employee_customers_permission&quot;:true,&quot;can_print_logo_on_paper_android&quot;:true,&quot;can_print_logo_on_paper_dashboard&quot;:true,&quot;can_print_logo_on_paper_ios&quot;:true,&quot;can_transfer_open_tickets_android&quot;:true,&quot;can_use_employee_filtering_for_paper_signature_android&quot;:true,&quot;can_see_new_locations_page&quot;:true,&quot;can_use_items_batching_in_android&quot;:true,&quot;can_use_items_batching_in_ios&quot;:true,&quot;can_use_customer_subscription_packages&quot;:true,&quot;can_use_r12_pairing_v2&quot;:true,&quot;can_use_predefined_tickets_ios&quot;:true,&quot;can_use_remote_device_settings&quot;:true,&quot;can_use_recurring_invoicing&quot;:true,&quot;can_use_employee_filtering_for_open_tickets_android&quot;:true,&quot;can_use_gift_card_interlocation_report&quot;:true,&quot;can_use_feedback_outbound_messaging&quot;:true,&quot;can_use_punch_adjustments&quot;:true,&quot;can_see_payroll_employees_upsell&quot;:true,&quot;can_cardholder_name_on_dip_android&quot;:true,&quot;can_use_r12_keepalive_over_usb&quot;:true,&quot;can_support_items_applet_in_ios&quot;:true,&quot;can_use_separate_applet_for_register_api_ios&quot;:true,&quot;can_can_allow_swipe_for_chip_cards_android&quot;:true,&quot;can_can_allow_swipe_for_chip_cards_ios&quot;:true,&quot;can_can_bulk_delete_open_tickets_android&quot;:true,&quot;can_should_deliver_mobile_staff_upgrade_notification&quot;:true,&quot;can_require_secure_session_for_r6_swipe&quot;:true,&quot;can_allow_new_deposit_settings&quot;:true,&quot;can_see_dashboard_item_drilldowns&quot;:true,&quot;can_use_multiunit_item_import_export&quot;:true,&quot;can_clear_inflight_register_api_requests&quot;:true,&quot;can_use_inventory2&quot;:true,&quot;can_allow_custom_employee_passcode&quot;:true,&quot;can_use_crm_messaging_rollout&quot;:true,&quot;can_cardholder_name_on_dip_ios&quot;:true,&quot;can_can_see_marketing_upsell&quot;:true,&quot;can_checklist_recommended_products&quot;:true,&quot;can_employee_management_preferences_use_fix&quot;:true,&quot;can_collect_tip_before_authorization_preferred&quot;:true,&quot;can_protect_edit_tax&quot;:true,&quot;can_use_loyalty_mobile_config&quot;:true,&quot;can_view_gift_card_history_events&quot;:true,&quot;can_allow_invoice_search_android&quot;:true,&quot;can_allow_invoice_search_ios&quot;:true,&quot;can_international_use_employee_management_register_preferences&quot;:true,&quot;can_use_reports_iphone&quot;:true,&quot;can_use_predefined_tickets_android&quot;:true,&quot;can_item_based_punches&quot;:true,&quot;can_see_quick_add_item_ios&quot;:true,&quot;can_see_reports_dashboard_link_ios&quot;:true,&quot;can_merge_open_tickets_android&quot;:true,&quot;can_see_advanced_modifiers_merchant_catalog&quot;:true,&quot;can_use_reports_unified_options_ios&quot;:true,&quot;can_use_square_printers&quot;:true,&quot;can_link_card_on_file_ca&quot;:true,&quot;can_use_card_on_file_in_android_register_ca&quot;:true,&quot;can_use_card_on_file_in_android_register_on_mobile_ca&quot;:true,&quot;can_use_card_on_file_in_ios_register_ca&quot;:true,&quot;can_buyer_can_send_loyalty_status_ios&quot;:true,&quot;can_link_card_on_file_au&quot;:true,&quot;can_link_card_on_file_jp&quot;:true,&quot;can_link_card_on_file_uk&quot;:true,&quot;can_use_card_on_file_in_android_register_on_mobile_uk&quot;:true,&quot;can_use_card_on_file_in_android_register_uk&quot;:true,&quot;can_use_card_on_file_in_ios_register_uk&quot;:true,&quot;can_use_employees_index_pagination&quot;:true,&quot;can_use_payroll_salaried_employees&quot;:true,&quot;can_use_pre_tax_tipping_ios&quot;:true,&quot;can_preview_program_restaurant_beta&quot;:true,&quot;can_multiunit&quot;:true,&quot;can_subscribe_to_register_pro&quot;:true,&quot;can_get_introductory_payment_notice&quot;:true,&quot;can_use_spend_based_punches&quot;:true,&quot;can_force_web_activation&quot;:true,&quot;can_appointments_employee_management_permissions&quot;:true,&quot;can_appointments_subscribe_on_sub2&quot;:true,&quot;can_beemoreporter_disable_legacy_item_details_report&quot;:false,&quot;can_beemoreporter_use_mds_for_employee_sales_summary&quot;:true,&quot;can_beemoreporter_use_transaction_families_in_deposit_report&quot;:true,&quot;can_bizbank_use_balance_applet&quot;:false,&quot;can_capital_use_application_flow_for_flex_loans&quot;:false,&quot;can_cardonfile_use_card_on_file_dashboard&quot;:false,&quot;can_cardonfile_use_card_on_file_register&quot;:false,&quot;can_catalog_dashboard_use_sentry_exceptions&quot;:true,&quot;can_catalog_disable_items_dashboard&quot;:false,&quot;can_catalog_see_global_unit_cost&quot;:true,&quot;can_catalog_see_taxable_surcharge&quot;:false,&quot;can_catalog_show_example_type_tab&quot;:false,&quot;can_catalog_show_location_selector&quot;:true,&quot;can_catalog_show_menu_type_tab&quot;:false,&quot;can_catalog_use_pagination&quot;:false,&quot;can_catalog_use_updated_modifiers_view&quot;:false,&quot;can_clinton_first_invoice_tutorial&quot;:true,&quot;can_clinton_invoice_file_attachments&quot;:true,&quot;can_clinton_new_creation_form&quot;:true,&quot;can_crm_can_retrieve_automatic_contact&quot;:false,&quot;can_crm_can_update_instant_profile_setting&quot;:true,&quot;can_crm_disable_instant_profile&quot;:false,&quot;can_crm_see_directory_nps_survey&quot;:false,&quot;can_crm_see_notes_feedback_survey&quot;:false,&quot;can_crm_see_profile_blade&quot;:false,&quot;can_crm_see_profile_invoices&quot;:true,&quot;can_crm_see_profile_metadata&quot;:false,&quot;can_crm_see_profile_print&quot;:true,&quot;can_crm_use_activity_feed&quot;:true,&quot;can_crm_use_custom_attributes&quot;:false,&quot;can_crm_use_direct_messaging&quot;:true,&quot;can_crm_use_directory&quot;:true,&quot;can_crm_use_feedback&quot;:true,&quot;can_crm_use_new_groups_and_filtering&quot;:true,&quot;can_crm_use_notes&quot;:false,&quot;can_crm_use_profile_attachments&quot;:true,&quot;can_crm_use_reminders&quot;:true,&quot;can_customers_use_email_collection&quot;:false,&quot;can_customers_use_pos_email_collection&quot;:false,&quot;can_dashboard_app_marketplace_enabled&quot;:false,&quot;can_dashboard_can_see_payroll_pulse_widget&quot;:false,&quot;can_dashboard_can_see_terminal_pulse_widget&quot;:false,&quot;can_dashboard_check_password_using_multipass&quot;:true,&quot;can_dashboard_evolution_phase_0&quot;:false,&quot;can_dashboard_evolution_phase_1&quot;:true,&quot;can_dashboard_fetch_subunits_skipping_deposit_tags&quot;:false,&quot;can_dashboard_handle_online_store_onboarding&quot;:false,&quot;can_dashboard_handle_online_store_unit_selector&quot;:true,&quot;can_dashboard_in_premium_group_four_a&quot;:false,&quot;can_dashboard_in_premium_group_four_b&quot;:false,&quot;can_dashboard_in_premium_group_four_c&quot;:false,&quot;can_dashboard_in_premium_group_four_d&quot;:false,&quot;can_dashboard_in_premium_group_one_a&quot;:false,&quot;can_dashboard_in_premium_group_one_b&quot;:false,&quot;can_dashboard_in_premium_group_one_c&quot;:false,&quot;can_dashboard_in_premium_group_one_d&quot;:false,&quot;can_dashboard_in_premium_group_three_a&quot;:false,&quot;can_dashboard_in_premium_group_three_b&quot;:false,&quot;can_dashboard_in_premium_group_three_c&quot;:false,&quot;can_dashboard_in_premium_group_three_d&quot;:false,&quot;can_dashboard_in_premium_group_two_a&quot;:false,&quot;can_dashboard_in_premium_group_two_b&quot;:false,&quot;can_dashboard_in_premium_group_two_c&quot;:false,&quot;can_dashboard_in_premium_group_two_d&quot;:false,&quot;can_dashboard_invoices_cancel_v2_api_enabled&quot;:true,&quot;can_dashboard_invoices_clone_v2_api_enabled&quot;:false,&quot;can_dashboard_invoices_delete_draft_v2_api_enabled&quot;:true,&quot;can_dashboard_invoices_get_v2_api_enabled&quot;:false,&quot;can_dashboard_invoices_item_level_discounts_enabled&quot;:false,&quot;can_dashboard_invoices_list_v2_api_enabled&quot;:true,&quot;can_dashboard_invoices_mark_as_paid_v2_api_enabled&quot;:false,&quot;can_dashboard_invoices_merchant_metadata_v2_api_enabled&quot;:true,&quot;can_dashboard_invoices_pay_out_of_band_v2_api_enabled&quot;:true,&quot;can_dashboard_invoices_send_reminder_custom_message&quot;:true,&quot;can_dashboard_invoices_send_reminder_v2_api_enabled&quot;:true,&quot;can_dashboard_invoices_shipping_address_enabled&quot;:true,&quot;can_dashboard_invoices_use_sentry_exceptions&quot;:true,&quot;can_dashboard_legacy_merchant_use_multiunit_view&quot;:true,&quot;can_dashboard_mds_migration_debugging&quot;:false,&quot;can_dashboard_mds_migration_diff_but_use_original_value&quot;:true,&quot;can_dashboard_mds_migration_use_mds_value&quot;:true,&quot;can_dashboard_referrals_v2_dashboard&quot;:false,&quot;can_dashboard_referrals_v2_display_your_rewards&quot;:false,&quot;can_dashboard_request_apple_pay_marketing_kit&quot;:false,&quot;can_dashboard_see_apos_marketing&quot;:true,&quot;can_dashboard_see_customer_search&quot;:true,&quot;can_dashboard_see_direct_debit_in_gb&quot;:true,&quot;can_dashboard_see_disputes&quot;:true,&quot;can_dashboard_see_feedback_surveys&quot;:true,&quot;can_dashboard_see_instant_deposit_upsell_in_deposit_report&quot;:true,&quot;can_dashboard_see_interac_pricing&quot;:true,&quot;can_dashboard_see_invoices_create_form_feedback_survey&quot;:true,&quot;can_dashboard_see_invoices_recurring_feedback_survey&quot;:true,&quot;can_dashboard_see_items_search&quot;:true,&quot;can_dashboard_see_jcb_invoices&quot;:true,&quot;can_dashboard_see_jp_specific_pricing&quot;:true,&quot;can_dashboard_see_new_recurring_creation_form&quot;:false,&quot;can_dashboard_see_new_transaction_details&quot;:true,&quot;can_dashboard_see_register_hardware_pricing&quot;:true,&quot;can_dashboard_see_retail_checklist&quot;:true,&quot;can_dashboard_see_secure_profile&quot;:true,&quot;can_dashboard_see_support_center_blade&quot;:true,&quot;can_dashboard_see_timecards_v2&quot;:false,&quot;can_dashboard_set_unit_token_in_card_linking&quot;:false,&quot;can_dashboard_shift_left_secondary_navigation&quot;:false,&quot;can_dashboard_show_ca_r12_hint&quot;:true,&quot;can_dashboard_show_loading_spinner&quot;:true,&quot;can_dashboard_show_new_deposits_report&quot;:false,&quot;can_dashboard_show_new_sales_trends&quot;:false,&quot;can_dashboard_show_pulse_last_year&quot;:true,&quot;can_dashboard_show_quick_actions_on_pulse&quot;:false,&quot;can_dashboard_show_universal_help&quot;:false,&quot;can_dashboard_split_disputes_by_resolution&quot;:true,&quot;can_dashboard_terminal_pulse_widget&quot;:false,&quot;can_dashboard_update_tax_information&quot;:true,&quot;can_dashboard_use_beemo_for_tenders_awaiting_tip&quot;:true,&quot;can_dashboard_use_bookshelf_search&quot;:true,&quot;can_dashboard_use_custom_aggregate_filter&quot;:false,&quot;can_dashboard_use_dashboard_search&quot;:true,&quot;can_dashboard_use_device_profiles&quot;:false,&quot;can_dashboard_use_ember_cli_javascript&quot;:true,&quot;can_dashboard_use_ember_cli_vendor_css&quot;:true,&quot;can_dashboard_use_fr_bank_linking&quot;:false,&quot;can_dashboard_use_milestones&quot;:false,&quot;can_dashboard_use_new_free_processing_design&quot;:true,&quot;can_dashboard_use_new_report_filters&quot;:false,&quot;can_dashboard_use_non_transaction_search_dropdown_filter_v2s&quot;:true,&quot;can_dashboard_use_old_navigation_placement&quot;:true,&quot;can_dashboard_use_register_device_settings&quot;:false,&quot;can_dashboard_use_sentry_exceptions&quot;:false,&quot;can_dashboard_use_separate_translation_js_file&quot;:true,&quot;can_dashboard_use_transaction_payment_filter_v2&quot;:true,&quot;can_dashboard_use_weekend_balance&quot;:true,&quot;can_devplat_use_partner_apps_cms_on_dashboard&quot;:true,&quot;can_employee_employee_management_enabled&quot;:false,&quot;can_employee_fetch_employee_filter&quot;:true,&quot;can_employee_mobile_staff_v2_enabled&quot;:true,&quot;can_employee_prevent_employee_management_activation&quot;:false,&quot;can_employee_subscribe_on_sub2&quot;:true,&quot;can_employee_updated_guest_access&quot;:false,&quot;can_giftcard_can_activate_egift_cards&quot;:false,&quot;can_giftcard_create_custom_egift&quot;:true,&quot;can_giftcard_show_dashboard_survey&quot;:false,&quot;can_giftcard_show_marketing&quot;:false,&quot;can_giftcard_show_promotional_egift&quot;:true,&quot;can_giftcard_show_share_promotional_egift&quot;:false,&quot;can_giftcard_use_beemo_summary_report&quot;:false,&quot;can_giftcard_use_new_activation_flow&quot;:true,&quot;can_giftcard_use_top_level_dashboard_nav&quot;:false,&quot;can_identities_allow_multiunit_deactivation&quot;:true,&quot;can_identities_dashboard_locale_from_session&quot;:false,&quot;can_identities_hide_security_questions&quot;:false,&quot;can_identities_use_new_deactivation_flow&quot;:true,&quot;can_identities_use_person_locale&quot;:false,&quot;can_identities_use_person_timezone&quot;:false,&quot;can_instruments_cof_verification_mode&quot;:false,&quot;can_invoices_use_inventory_settings&quot;:true,&quot;can_kelly_migrate_to_access_all_sales_activity_permission&quot;:true,&quot;can_subscribe_to_retail&quot;:false,&quot;can_loyalty_always_show_loyalty&quot;:false,&quot;can_loyalty_loyalty_beyond_pos&quot;:true,&quot;can_loyalty_pause_program&quot;:true,&quot;can_loyalty_show_dashboard_survey&quot;:false,&quot;can_loyalty_show_directory_profile&quot;:true,&quot;can_loyalty_status_in_transaction&quot;:true,&quot;can_loyalty_unlink_cards_in_directory&quot;:true,&quot;can_loyalty_use_draft_fetches&quot;:true,&quot;can_loyalty_use_new_desktop_config&quot;:true,&quot;can_loyalty_use_rpc_to_find_merchant_programs&quot;:true,&quot;can_loyalty_void_coupons_in_directory&quot;:true,&quot;can_marketing_fetch_contact_method&quot;:false,&quot;can_marketing_fetch_facebook_contact_method&quot;:false,&quot;can_marketing_show_assistant_page&quot;:false,&quot;can_marketing_show_dashboard_survey&quot;:false,&quot;can_marketing_show_receipts_stats&quot;:true,&quot;can_marketing_show_settings_page&quot;:true,&quot;can_marketing_show_themes_page&quot;:true,&quot;can_marketing_use_advanced_audience&quot;:true,&quot;can_marketing_use_receipts_channel&quot;:true,&quot;can_moco_show_legacy_mobile_staff_data&quot;:true,&quot;can_neptr_show_fee_detail&quot;:false,&quot;can_neptr_use_transaction_list_in_transaction_csvs&quot;:true,&quot;can_onboard_can_canada_order_r12&quot;:true,&quot;can_receipts_see_receipt_editor&quot;:true,&quot;can_reports_see_deposit_links_in_transaction_blade&quot;:true,&quot;can_reports_use_alternate_sales_summary&quot;:false,&quot;can_reports_use_filter_v2_item_details_csv&quot;:true,&quot;can_reports_use_filter_v2_transaction_csvs&quot;:true,&quot;can_reports_use_gift_cards&quot;:false,&quot;can_reports_use_item_details_post_csv&quot;:true,&quot;can_reports_use_modifier_quantity&quot;:true,&quot;can_reports_use_new_daily_sales_summary_email_layout&quot;:true,&quot;can_reports_use_sales_summary_returns_label&quot;:false,&quot;can_reports_use_transactions_v3_in_deposits&quot;:true,&quot;can_restaurants_add_function_tiles_0_11_0&quot;:true,&quot;can_restaurants_auto_straight_fire&quot;:true,&quot;can_restaurants_default_item_skip_detail_screen&quot;:false,&quot;can_restaurants_seating&quot;:true,&quot;can_restaurants_set_who_fires_courses&quot;:true,&quot;can_restaurants_show_category_info_tooltip&quot;:false,&quot;can_restaurants_use_auto_gratuities&quot;:true,&quot;can_restaurants_use_conversational_reporting&quot;:true,&quot;can_restaurants_use_gratuity_free_receipts&quot;:true,&quot;can_restaurants_use_menu_group_memberships&quot;:true,&quot;can_restaurants_use_menu_manager&quot;:true,&quot;can_restaurants_use_menu_manager_dx_design&quot;:false,&quot;can_restaurants_use_menu_manager_modifiers&quot;:false,&quot;can_restaurants_use_menu_manager_reorder_groups&quot;:false,&quot;can_restaurants_use_menu_manager_undo_redo&quot;:true,&quot;can_restaurants_use_menu_reporting&quot;:true,&quot;can_restaurants_use_rst&quot;:false,&quot;can_retail_alternative_onboarding_order&quot;:true,&quot;can_retail_ecommerce_alpha_1&quot;:true,&quot;can_retail_ecommerce_beta&quot;:false,&quot;can_retail_enable_native_client_onboarding&quot;:true,&quot;can_retail_label_printing_phase_1&quot;:true,&quot;can_retail_label_printing_phase_2&quot;:true,&quot;can_retail_label_printing_phase_3&quot;:true,&quot;can_retail_purchase_order_create_with_new_schema_version&quot;:true,&quot;can_retail_reports_category&quot;:true,&quot;can_retail_reports_projected_profit&quot;:true,&quot;can_retail_see_inventory_history&quot;:true,&quot;can_retail_updated_onboarding&quot;:true,&quot;can_retail_vendor_management&quot;:true,&quot;can_retail_vendor_management_phase_2&quot;:true,&quot;can_terminal_app_dip_cof_post_payment&quot;:false,&quot;can_terminal_app_x2_dip_card_for_customer_cof&quot;:false,&quot;can_terminal_enabled&quot;:false,&quot;can_terminal_mds_batch_get_unit&quot;:false,&quot;can_terminal_mds_get_merchant&quot;:false,&quot;can_terminal_should_send_auto_receipt_request_with_userlookup&quot;:false,&quot;can_terminal_should_show_feedback&quot;:false,&quot;can_terminal_should_show_referral&quot;:false,&quot;can_timecards_break_tracking_enabled&quot;:false,&quot;can_timecards_overtime_enabled&quot;:false,&quot;can_edit_bank_accounts&quot;:false,&quot;can_edit_business_profile&quot;:false,&quot;can_edit_email_notifications&quot;:true,&quot;can_edit_pulse_widget_order&quot;:true,&quot;can_edit_pulse_widgets&quot;:true,&quot;can_enable_referrals_in_receipt_editor&quot;:false,&quot;can_legacy_merchant_see_multi_unit_view&quot;:true,&quot;can_order_accessories&quot;:false,&quot;can_request_reader_or_stickers&quot;:false,&quot;can_show_universal_search&quot;:false,&quot;can_see_app_marketplace&quot;:true,&quot;can_see_capital_pulse_widget&quot;:true,&quot;can_see_checklist_badge&quot;:false,&quot;can_see_community_search&quot;:true,&quot;can_see_customer_info_in_overview&quot;:false,&quot;can_see_customer_list_custom_attributes&quot;:false,&quot;can_see_customers_getting_started&quot;:false,&quot;can_see_customers_settings&quot;:true,&quot;can_see_customers_settings_profiles&quot;:true,&quot;can_see_dashboard_search&quot;:true,&quot;can_see_dashboard_surveys&quot;:false,&quot;can_see_deposits&quot;:false,&quot;can_see_deposit_settings&quot;:false,&quot;can_see_device_credential_filter&quot;:true,&quot;can_see_disputes_dashboard&quot;:true,&quot;can_see_fee_statements&quot;:false,&quot;can_see_feedback_tab&quot;:true,&quot;can_see_getting_started_home&quot;:false,&quot;can_see_gift_cards&quot;:false,&quot;can_see_gift_cards_pulse_widget&quot;:true,&quot;can_see_instant_deposit_pulse_widget&quot;:true,&quot;can_see_interstitial&quot;:true,&quot;can_see_invoices&quot;:false,&quot;can_see_invoices_pulse_widget&quot;:true,&quot;can_see_last_employee_update_filter&quot;:true,&quot;can_see_loyalty_pulse_widget&quot;:true,&quot;can_see_marketing_pulse_widget&quot;:true,&quot;can_see_new_checklist&quot;:false,&quot;can_see_orders&quot;:false,&quot;can_see_overwrite_csv_item_import&quot;:true,&quot;can_see_receipt_editor&quot;:true,&quot;can_see_referrals&quot;:false,&quot;can_see_rewards_tab&quot;:false,&quot;can_see_secure_profile&quot;:true,&quot;can_see_shop_order_history&quot;:false,&quot;can_see_stand_link&quot;:false,&quot;can_see_tax_info&quot;:false,&quot;can_see_tax_statements&quot;:false,&quot;can_see_terminal_employee_permission&quot;:false,&quot;can_see_time_range_in_transactions&quot;:true,&quot;can_see_top_level_timecards_nav&quot;:false,&quot;can_toggle_voter_registration_in_receipt_editor&quot;:false,&quot;can_use_card_on_file&quot;:false,&quot;can_use_register_card_on_file&quot;:false,&quot;can_use_directory_attribute_types_beta2&quot;:true,&quot;can_use_inventory_settings&quot;:true,&quot;can_use_invoices_applet&quot;:false,&quot;can_use_market&quot;:false,&quot;can_use_offline_mode&quot;:false,&quot;can_use_payroll&quot;:false,&quot;can_use_promote_tab_for_market&quot;:false,&quot;can_use_timecards_overtime_reports&quot;:false,&quot;can_view_employee_permissions&quot;:true,&quot;delegate_accounts_enable_store_and_forward&quot;:false,&quot;delegate_accounts_make_refunds&quot;:false,&quot;is_au&quot;:false,&quot;is_canadian_or_japanese&quot;:false,&quot;is_delegate&quot;:false,&quot;is_fr&quot;:false,&quot;is_gb&quot;:false,&quot;is_multiunit&quot;:true,&quot;is_not_canadian_or_japanese&quot;:true,&quot;is_not_multiunit&quot;:false,&quot;is_online_sales_supported&quot;:false,&quot;is_subunit&quot;:false,&quot;is_unit_login&quot;:false,&quot;is_us&quot;:false,&quot;item_drilldown_banner_enabled&quot;:false,&quot;should_not_see_employee_management&quot;:true,&quot;should_order_hardware_from_shop_au&quot;:false,&quot;should_order_hardware_from_shop_gb&quot;:false,&quot;should_order_reader_from_dashboard&quot;:false,&quot;should_order_reader_from_shop_jp&quot;:false,&quot;should_prevent_employee_management_activation&quot;:true,&quot;should_see_advanced_inventory&quot;:false,&quot;should_see_employee_management&quot;:false,&quot;should_see_employee_upsell&quot;:false,&quot;should_see_multiunit_upgrade&quot;:false,&quot;should_see_online_store&quot;:false,&quot;should_see_terminal&quot;:false,&quot;should_show_business_settings_section&quot;:true,&quot;should_show_customer_list&quot;:true,&quot;should_show_customers_overview&quot;:true,&quot;should_show_devices&quot;:true,&quot;should_show_item_type_selector&quot;:false,&quot;should_show_manager_mode&quot;:false,&quot;should_show_marketing&quot;:false,&quot;should_show_mobile_staff&quot;:false,&quot;should_show_mobile_staff_report&quot;:false,&quot;show_mobile_employee_access_sales_history&quot;:false,&quot;use_employee_for_paper_sig_and_enable_tipping&quot;:false,&quot;user_is_not_eligible_for_square_card_processing&quot;:true,&quot;can_see_restaurants_features&quot;:false,&quot;can_see_menus_navigation&quot;:false,&quot;can_see_points_of_sale_navigation&quot;:false,&quot;supported_card_brands_offline&quot;:null,&quot;eligible_for_square_card_processing&quot;:false,&quot;is_in_country_with_invoices&quot;:false,&quot;is_in_country_with_sms&quot;:false,&quot;is_in_country_with_tapped_payments&quot;:false,&quot;is_in_country_with_dipped_payments&quot;:false,&quot;is_in_country_with_flexible_close_of_day&quot;:false,&quot;is_in_country_with_tips&quot;:false,&quot;is_in_country_with_deposit_settings&quot;:false,&quot;dashboard_evolution_phase_1&quot;:false,&quot;dashboard_evolution_phase_1_opt_in_banner&quot;:false,&quot;dashboard_evolution_header&quot;:false}"></div>




  <script src="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/vendor-b30549411b848c42e7b7a0c0765d0eda.js" nonce=""></script>
  <script src="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/third-party-30e90beaad91c348441d537201b66d1d.js"
    nonce=""></script>
  <script src="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/en-US.module-e0f7dbb45f9711f02edf39d62957ede1.js"
    nonce=""></script>





  <link data-ember-cli="1" rel="stylesheet" href="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/vendor-742eb1496b94c554a162555a16bfe09a.css">
  <link rel="stylesheet" media="all" href="<?php echo Configure::read('Settings.DOMAIN');?>/Square_files/application-ba1cf9582083e9465130406d542d45eb.css">



</body>

</html>