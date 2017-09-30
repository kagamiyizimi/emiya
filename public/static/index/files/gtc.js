(function() {
    var c = window._gtc;
    if (c && !(c instanceof Array)) {
        return
    }
    if (!c) {
        c = []
    }
    var a = {};
    a.version = "3.0.1";
    a.bLog = false;
    a._hs = (window.location.protocol == "https:") ? "https://dsp-ddzh.huaat.com": "http://dsp-ddzh.huaat.com";
    a.asUrl = {
        "tUrl": a._hs + "/gm.gif",
        "rUrl": a._hs + "/gm.gif",
        "oUrl": a._hs + "/gm.gif"
    };
    a.gaccount = "";
	a.words = "";
    a.v = null;
    a.redirect = true;
    a.cookieMapping = true;
    function p(x) {
        for (var w = 0; w < x.length; w++) {
            var v = x[w];
            if (v[0]) {
                var t = v[0].toLowerCase();
                if (t == a.oData.setAccount) {
                    if (v.length > 1) {
                        a.gaccount = v[1]
                    }
                } else if (t == a.oData.keyWords) {
                    if (v.length > 1) {
                        a.words = v[1]
                    }
                }else {
                    if (t == a.oData.fnSetRD) {
                        if (v.length > 1 && (v[1] == "0" || v[1] == 0)) {
                            a.redirect = false
                        }
                    } else {
                        if (t == a.oData.fnSetCM) {
                            if (v.length > 1 && (v[1] == "0" || v[1] == 0)) {
                                a.cookieMapping = false
                            }
                        } else {
                            if (t == a.oData.gtcVersion) {
                                a.v = v[1]
                            } else {
                                if (t == a.oData.fngeneral) {
                                    var u = a.oData[v[1]];
                                    if (u) {
                                        if (v.length > 2) {
                                            u.apply(null, v.slice(2))
                                        } else {
                                            u.call(null)
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    function e() {
        m.log("arrived");
        var v = (new Date()).getTime();
        var w = "";
        if (l()) {
            w = "&ct=" + v
        } else {
            w = "&" + a.oParams.gm_ct + "=" + v
        }
        var u = "";
        u = o(a.oData.oTypes.reach, "", w);
        var t = window.document.domain;
        m.cookie.setCookie(a.oData.cookieName, w, 31, "/", t);
        m.imger(u, v)
    }
    function i() {
        m.log("register");
        var t = "";
        if (l()) {
            t = m.pnToUrl(["od"], arguments)
        } else {
            t = m.pnToUrl(a.oData.registeredPN, arguments)
        }
        var u = o(a.oData.oTypes.register, t);
        m.imger(u)
    }
    function r() {
        m.log("Order");
        var u = arguments[0];
        var t = arguments[1];
        var w = "";
        if (l()) {
            w = "&od=";
            if (u && u != "undefined" && u != "null") {
                w = w + u
            }
            w = w + "&mn=";
            if (t && t != "undefined" && t != "null") {
                w = w + t
            }
            m.imger(o(a.oData.oTypes.order, w))
        } else {
            w = "&" + a.oParams.gm_oi + "=";
            if (u && u != "undefined" && u != "null") {
                w = w + u
            }
            w = w + "&" + a.oParams.gm_os + "=";
            if (t && t != "undefined" && t != "null") {
                w = w + t
            }
            var y = arguments[3];
            if (y && y != "undefined" && y != "null") {
                w = w + "&" + a.oParams.gm_ui + "=" + encodeURIComponent(y)
            }
            var v = arguments[4];
            if (v && v != "undefined" && v != "null") {
                w = w + "&" + a.oParams.gm_un + "=" + encodeURIComponent(v)
            }
            m.imger(o(a.oData.oTypes.order, w));
            var x = arguments[2];
            j(x, a.oData.oTypes.orderGoods, u, false)
        }
    }
    function g(t) {
        if (c && c.length > 0) {
            for (var u = 0; u < c.length; u++) {
                var y = c[u];
                if (y && y[0].toLowerCase() == a.oData.orderitem && y.length > 2) {
                    var x = "&" + a.oData.ordercreatePN[0] + "=" + y[1];
                    var w = f(t, y[2]);
                    m.log("order goods");
                    var v = o(a.oData.oTypes.orderGoods, x + w);
                    m.imger(v)
                }
            }
        }
    }
    function d() {
        m.log("goods");
        var t = arguments[0];
        j(t, a.oData.oTypes.goods, "", true)
    }
    function j(y, u, w, x) {
        if (y && y != "undefined" && y != "null") {
            var D = "";
            if (x) {
                D = "&" + a.oParams.goods.referhost + "=";
                var v = document.referrer;
                if (v && v.length > 0) {
                    var E = v.indexOf("//");
                    if (E >= 0) {
                        E = E + 2;
                        var B = v.substring(E);
                        B = B.substring(0, B.indexOf("/ ") + 1);
                        D = D + encodeURIComponent(v.substring(0, E) + B)
                    }
                }
            }
            for (var t = 0; t < y.length; t++) {
                var A = y[t];
                var C = f(w, A);
                var z = o(u, D + C, "", a.asUrl.rUrl, true);
                m.imger(z)
            }
        }
    }
    function q() {
        m.log("Define");
        var x = "";
        var w = arguments[0];
        if (w && w != "undefined" && w != "null") {
            if (l()) {
                x = x + "&zid=" + w
            } else {
                x = x + "&" + a.oParams.gm_zid + "=" + w
            }
        }
        var t = arguments[1];
        if (t && t != "undefined" && t != "null") {
            var u = a.oParams.gm_fn;
            for (var y = 0; y < t.length; y++) {
                if (l()) {
                    x = x + "&f" + (y + 1) + "=" + t[y]
                } else {
                    x = x + "&" + u + (y + 1) + "=" + t[y]
                }
            }
        }
        var v = o(a.oData.oTypes.define, x);
        m.imger(v)
    }
    function k() {
        var v = arguments[0];
        if (v && v != "undefined" && v != "null") {
            var w = arguments[1];
            if (!w || w == "undefined" || w == "null") {
                w = ""
            }
            var t = arguments[2];
            if (!t || t == "undefined" || t == "null") {
                t = false
            } else {
                t = true
            }
            for (var u = 0; u < v.length; u++) {
                h(v[u], w, t)
            }
        }
    }
    function h(v, w, t) {
        var u = document.getElementById(v);
        if (u) {
            m.addEvent(u, "click",
            function() {
                var y = "";
                y = y + "&" + a.oParams.gm_bcp + "=" + encodeURIComponent(w);
                y = y + "&" + a.oParams.gm_bc + "=" + encodeURIComponent(v);
                var x = o(a.oData.oTypes.btnClick, y);
                m.imger(x)
            },
            t)
        }
    }
    function o(z, u, y, x, t) {
        var w = "";
        if (l() && !t) {
            w = a.asUrl.oUrl;
            if (x) {
                w = x
            }
            w = w + "?gtmac=" + b(a, c, true);
            w = w + "&tp=" + z;
            if (u && u.length > 0) {
                w = w + u
            }
            if (y && y.length > 0) {
                w = w + y
            } else {
                var v = m.cookie.getCookie(a.oData.cookieName);
                w = w + v
            }
            w = w + "&r=" + m.fnRd()
        } else {
            w = a.asUrl.tUrl;
            if (x) {
                w = x
            }
            w = w + "?" + b(a, c, false);
            w = w + "&" + a.oParams.gm_tp + "=" + z;
            if (y && y.length > 0) {
                w = w + y
            } else {
                var v = m.cookie.getCookie(a.oData.cookieName);
                w = w + v
            }
            if (u && u.length > 0) {
                w = w + u
            }
            w = w + "&" + a.oParams.gm_rd + "=" + m.fnRd();
            m.log(w)
        }
        return w
    }
    function l() {
        return (a.v && "1" == a.v)
    }
    function b(v, w, y) {
        var u = "";
        if (v && v.gaccount) {
            u = v.gaccount
        } else {
            if (w && w.length > 0) {
                for (var t = 0; t < w.length; t++) {
                    var x = w[t];
                    if (x && x[0].toLowerCase() == a.oData.setAccount && x.length > 1) {
                        a.gaccount = x[1];
                        u = x[1]
                    }
					 if (x && x[0].toLowerCase() == a.oData.keyWords && x.length > 1) {
                        a.words = x[1];
                    }
                }
            }
        }
        if (!y) {
            u = a.oParams.gm_ac + "=" + u
        }
        return u
    }
    function f(t, x) {
        var y = "";
        if (t && t != "undefined" && t != "null") {
            y = y + "&" + a.oParams.gm_oi + "=" + t
        }
        var w = a.oParams.goods;
        for (var u in x) {
            var v = w[u.toLowerCase()];
            if (v && v != "undefined" && v != "null") {
                y = y + "&" + v + "=" + encodeURIComponent(x[u])
            }
        }
        return y
    }
    function n() {
        if (a.redirect) {
            m.log("retargeting");
            var v = o(a.oData.oTypes.redirect, "&" + s(), "", a.asUrl.rUrl, true);
            if (a.cookieMapping) {
                var t = a.oData.cookieMappingUrl;
                if (t) {
                    var u = m.cookie.getCookie(a.oData.cmCookieUrl);
                    var w = window.location.href+"?aid="+a.gaccount;
                    if (!u || w != u) {
                        m.cookie.setCookie(a.oData.cmCookieUrl, w, 90, "/");
                        setTimeout(function() {
                            for (var y in t) {
								var x = t[y];
								if(y=="huaat"){
									if(a.words && a.words.length>0){
										x +=window.location.protocol+"//"+window.location.host+"/"+a.words+"&t-"+new Date().getTime();
									}else{
										x +=window.location.href+"&t-"+new Date().getTime();
									}
								}  
                                m.log("cm:" + x);
                                m.imger(x)
                            }
							
                        },
                        a.oData.cmLazyTime)
                    }
                }
            }
        }
    }
    function s() {
        var F = window.location;
        var A = window.screen;
        var y = encodeURIComponent;
        var B = {};
        B.gm_v = a.version;
        B.gm_h = y(F.host);
        B.gm_p = y(F.pathname);
        B.gm_cs = m.getPageCharset();
        var E = document.title;
        if (!E) {
            try {
                var w = document.getElementByTagName("title");
                if (w && w.length > 0) {
                    E = w[0]
                } else {
                    E = ""
                }
            } catch(z) {
                E = ""
            }
        }
        B.gm_dt = y(E);
        B.gm_rf = y(document.referrer);
        B.gm_sc = A.colorDepth;
        B.gm_sr = A.width + "x" + A.height;
        B.gm_la = navigator.browserLanguage || navigator.language;
        var x = "";
        var D = a.oData.redirectPN;
        if (D && D.length > 0) {
            var t = a.oParams.redirect;
            var u = D[0];
            x = x + t[u] + "=" + B[u];
            if (D.length > 1) {
                for (var v = 1; v < D.length; v++) {
                    var C = D[v];
                    x = x + "&" + t[C] + "=" + B[C]
                }
            }
        }
        return x
    }
    a.oData = {
        "fngeneral": "fngeneral",
        "setAccount": "fnsetaccount",
		"keyWords": "keyWords",
        "fnSetRD": "fnsetrd",
        "fnSetCM": "fnsetcm",
        "arrived": e,
        "registered": i,
        "registeredPN": ["gm_ui", "gm_un"],
        "ordercreate": r,
        "addGoods": d,
        "ordercreatePN": ["gm_oi", "gm_os"],
        "orderitem": "fnorderitem",
        "define": q,
        "btnclick": k,
        "definePN": ["gm_k1", "gm_k2"],
        "redirectPN": ["gm_v", "gm_h", "gm_p", "gm_cs", "gm_dt", "gm_rf", "gm_sc", "gm_sr", "gm_la"],
        "cookieName": "_jstar",
        "cookiePN": "gmct",
        "cmCookieUrl": "huaatdsp",
        "gtcVersion": "v",
        "oTypes": {
            "reach": "1",
            "register": "2",
            "order": "3",
            "orderGoods": "31",
            "goods": "4",
            "btnClick": "5",
            "define": "9",
            "redirect": "8"
        },
        "cookieMappingUrl": {
			
        },
        "cmLazyTime": 2000
    };
    a.oParams = {
        "gm_ac": "gmac",
        "gm_tp": "gmtp",
        "gm_ct": "gmct",
        "gm_rd": "gmrd",
        "gm_ui": "gmui",
        "gm_un": "gmun",
        "gm_zid": "gmzid",
        "gm_kn": "gmk",
        "gm_fn": "gmf",
        "gm_oi": "gmoi",
        "gm_os": "gmom",
        "gm_bc": "gmbc",
        "gm_bcp": "gmbcp",
        "goods": {
            "referhost": "grh",
            "pname": "gnm",
            "price": "gpc",
            "clickurl": "gcu",
            "pid": "gid",
            "imgurl": "giu",
            "thumbimgurl": "gtu",
            "bname": "gbn",
            "bnameUrl": "gbu",
            "cname": "gcn",
            "subcategory": "gsc",
            "thirdcategory": "gdc",
            "fourthcategory": "gfc",
            "cpageurl": "gcpu",
            "subcpageurl": "gspu",
            "thirdcpageurl": "gtpu",
            "fourthcpageurl": "gfpu",
            "starttime": "gst",
            "invalidtime": "git",
            "originalprice": "gop",
            "inventorynum": "gin",
            "star": "gsr",
            "score": "gse"
        },
        "redirect": {
            "gm_v": "gmv",
            "gm_ac": "gmac",
            "gm_h": "gmh",
            "gm_p": "gmp",
            "gm_cs": "gmcs",
            "gm_dt": "gmdt",
            "gm_rf": "gmrf",
            "gm_sc": "gmsc",
            "gm_sr": "gmsr",
            "gm_la": "gmla",
            "gm_rd": "gmrd"
        }
    };
    a.util = {
        "pnToUrl": function(z, v) {
            var w = "";
            for (var y = 0; y < z.length; y++) {
                var x = z[y];
                var u = a.oParams[x];
                if (u && u.length > 0) {
                    x = u
                }
                var t = v[y];
                if (!t || t == "undefined" || t == "null") {
                    t = ""
                }
                w = w + "&" + x + "=" + encodeURIComponent(t)
            }
            return w
        },
        "jsonToUrl": function(u) {
            var t = "";
            for (var v in u) {
                t = t + "&" + v + "=" + encodeURIComponent(u[v])
            }
            return t
        },
        "imger": function(u, t) {
            var w = "t_" + t ? m.fnRd(t) : m.fnRd();
            var v = window[w] = new Image(1, 1);
            v.onload = (v.onerror = function() {
                window[w] = null
            });
            v.src = u;
            v = null
        },
        "addEvent": function(u, w, v, t) {
            if (u.addEventListener) {
                u.addEventListener(w, v, t)
            } else {
                if (u.attachEvent) {
                    u.attachEvent("on" + w, v)
                } else {
                    u["on" + w] = v
                }
            }
        },
        "delEvent": function(u, w, v, t) {
            if (u.removeEventListener) {
                u.removeEventListener(w, v, t)
            } else {
                if (u.attachEvent) {
                    u.detachEvent("on" + w, v)
                } else {
                    u["on" + w] = null
                }
            }
        },
        "cookie": {
            "outTime": 1 * 24,
            "setCookie2": function(t, v) {
                var u = new Date();
                if (!v) {
                    v = a.util.Cookie.outTime * 60 * 60 * 1000
                }
                u.setTime(u.getTime() + v);
                document.cookie = t + ";expires=" + u.toGMTString()
            },
            "setCookie": function(v, x, t, z, w, y) {
                var A = v + "=" + escape(x);
                if (t > 0) {
                    var u = new Date();
                    u.setTime(u.getTime() + t * 24 * 3600 * 1000);
                    A += ";expires=" + u.toGMTString()
                }
                if (z) {
                    A += ";path=" + z
                }
                if (w) {
                    A += ";domain=" + w
                }
                if (y) {
                    A += ";secure=" + y
                }
                document.cookie = A
            },
            "getCookie": function(v) {
                var w = document.cookie.indexOf(v + "=");
                var t = w + v.length + 1;
                if ((!w) && (v != document.cookie.substring(0, v.length))) {
                    return ""
                }
                if (w == -1) {
                    return ""
                }
                var u = document.cookie.indexOf(";", t);
                if (u == -1) {
                    u = document.cookie.length
                }
                return unescape(document.cookie.substring(t, u))
            }
        },
        "fnRd": function(t) {
            t = t ? t: new Date().getTime();
            return Math.round(t / 1000) + "" + Math.floor(Math.random() * 9000 + 1000)
        },
        "getPageCharset": function() {
            var t = "";
            if (document.all) {
                t = document.charset
            } else {
                t = document.characterSet
            }
            return t
        },
        "log": function(t, u) {
            if (!a.bLog) {
                return
            }
            if (window.console && console.log) {
                
            }
        }
    };
    var m = a.util;
    var req_js_url = (window.location.protocol == "https:") ? "https://cd.huaat.com/js/cm_url_https.js?t="+new Date().getTime(): "http://cd.huaat.com/js/cm_url_http.js?t="+new Date().getTime();
    $.ajax({
        url: req_js_url,
        async:false,
        dataType: "json",
        success: function(data){
	       if(data){
	            a.oData.cookieMappingUrl = data;
                }
     
         }
     });
    p(c);
    n()
})();