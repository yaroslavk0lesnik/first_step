var TelerWdMiniJS = new function () {
    this.all = all;
    this.select = select;
    this.addClass = addClass;
    this.removeClass = removeClass;
    this.bind = bind;
    this.unbind = unbind;
    this.text = text;
    this.draggable = draggable;
    this.ajax = ajax;
    this.cookie = cookie;
    this.toDom = toDom;
    this.toggleClass = toggleClass;
    this.cancelBubble = cancelBubble;
    this.width = width;
    this.focus = focus;
    this.trackGa = trackGa;
    this.trackFb = trackFb;

    function all(selector) {
        selector[0] == "." && (selector = selector.slice(1, selector.length));
        return document.getElementsByClassName(selector)
    }

    function select(selector) {
        return document.querySelector(selector)
    }

    function addClass(element, cssClass) {
        if ((" " + element.className + " ").indexOf(" " + cssClass + " ") == -1) {
            element.className += " " + cssClass
        }
    }

    function removeClass(element, cssClass) {
        element.className = element.className.replace(new RegExp("\\b" + cssClass + "\\b"), "")
    }

    function toggleClass(element, cssClass) {
        if ((" " + element.className + " ").indexOf(" " + cssClass + " ") == -1) {
            element.className += " " + cssClass
        } else {
            element.className = element.className.replace(new RegExp("\\b" + cssClass + "\\b"), "")
        }
    }

    function bind(element, event, listener) {
        if (!element) {
            console.log("CallCatcher bind error");
            return
        }
        if (window.addEventListener) {
            element.addEventListener(event, listener, false)
        } else if (window.attachEvent) {
            element.attachEvent("on" + event, listener)
        } else {
            element["on" + event] = listener
        }
    }

    function unbind(element, event, listener) {
        if (element.removeEventListener) {
            element.removeEventListener(event, listener, false)
        } else if (element.detachEvent) {
            element.detachEvent("on" + event, listener)
        } else {
            element["on" + event] = null
        }
    }

    function text(element, val) {
        var text = "innerText" in element ? "innerText" : "textContent";
        if (val) {
            element[text] = val
        } else {
            return element[text]
        }
    }

    function cancelBubble(e) {
        var evt = e ? e : window.event;
        if (evt.stopPropagation) evt.stopPropagation();
        if (evt.cancelBubble != null) evt.cancelBubble = true
    }

    function ajax(url, callback, data, contentType, queryParams) {
        function getQueryParamString(params) {
            var res = "";
            for (var prop in params) {
                res += `&${prop}=${params[prop]}`
            }
            return res
        }

        try {
            var x = new ((new XMLHttpRequest).withCredentials !== undefined ? XMLHttpRequest : XDomainRequest);
            x.open(data ? "POST" : "GET", url + "?timestamp=" + (new Date).valueOf() + "&utcOffset=" + (new Date).getTimezoneOffset() + (queryParams ? getQueryParamString(queryParams) : ""), 1);
            contentType && x.setRequestHeader && x.setRequestHeader("Content-Type", contentType);
            x.onload = function () {
                callback && callback(x.responseText, x)
            };
            x.onerror = function (e) {
                console.log("CallCatcher xhr error");
                console.log(e)
            };
            x.send(data)
        } catch (e) {
            console.log("CallCatcher xhr error");
            console.log(e)
        }
    }

    function cookie(name, value, days) {
        if (value) {
            return setCookie(name, value, days)
        } else {
            return getCookie(name)
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
            }
            return null
        }

        function setCookie(name, value, days) {
            if (days) {
                var date = new Date;
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1e3);
                var expires = "; expires=" + date.toGMTString()
            } else var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/"
        }
    }

    function toDom(text) {
        var div = document.createElement("div");
        var i;
        div.innerHTML = text;
        document.body.appendChild(div);
        var scripts = div.getElementsByTagName("script");
        for (i = 0; i < scripts.length; i++) {
            (function (i) {
                setTimeout(function () {
                    var script = document.createElement("script");
                    script.text = scripts[i].text;
                    script.text && document.head.appendChild(script).parentNode.removeChild(script)
                }, 100)
            })(i)
        }
        return div
    }

    function draggable(element, handlerEnd, handlerMove, handlerInit, exeptions) {
        var selected = null, x_pos = 0, y_pos = 0, x_elem = 0, y_elem = 0, savedX = 0, savedY = 0;

        function dragInit(e) {
            selected = this;
            x_elem = x_pos - selected.offsetLeft;
            y_elem = y_pos - selected.offsetTop;
            savedX = document.all ? window.event.clientX : e.pageX;
            savedY = document.all ? window.event.clientY : e.pageY;
            handlerInit && handlerInit.call(selected, {x: savedX, y: savedY})
        }

        function moveElem(e) {
            x_pos = document.all ? window.event.clientX : e.pageX;
            y_pos = document.all ? window.event.clientY : e.pageY;
            var newX = x_pos - x_elem, newY = y_pos - y_elem,
                witdh = Math.max(document.documentElement.clientWidth, window.innerWidth || 0),
                height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
            if (selected !== null) {
                newX > witdh - selected.clientWidth - 10 && (newX = witdh - selected.clientWidth - 10);
                newX < 10 && (newX = 10);
                newY > height - selected.clientHeight - 10 && (newY = height - selected.clientHeight - 10);
                newY < 10 && (newY = 10);
                selected.style.left = newX + "px";
                selected.style.top = newY + "px";
                handlerMove && handlerMove.call(selected, {x: newX, y: newY})
            }
        }

        function endDrag(event) {
            selected && handlerEnd && handlerEnd.call(event, Math.abs(savedX - x_pos) < 5 && Math.abs(savedY - y_pos) < 5);
            selected = null
        }

        this.bind(element, "mousedown", dragInit);
        this.bind(document, "mousemove", moveElem);
        this.bind(document, "mouseup", endDrag);
        if (exeptions) {
            var i, j;
            var elems;
            for (i = 0; i < exeptions.length; i++) {
                elems = this.all(exeptions[i]);
                for (j = 0; j < elems.length; j++) {
                    this.bind(elems[j], "mousedown", function (e) {
                        selected = null;
                        var evt = e ? e : window.event;
                        if (evt.stopPropagation) evt.stopPropagation();
                        if (evt.cancelBubble != null) evt.cancelBubble = true
                    })
                }
            }
        }
    }

    function width() {
        return Math.max(document.documentElement.clientWidth, window.innerWidth || 0)
    }

    function focus(element) {
        element.focus();
        element.tagName == "INPUT" && element.setSelectionRange && element.setSelectionRange(element.value.length, element.value.length)
    }

    function trackGa(category, action) {
        if (typeof dataLayer == "object" && dataLayer.push) {
            var handled = false;
            if (typeof gtag == "function") {
                for (var i = 0; i < dataLayer.length; i++) {
                    if (dataLayer[i].length < 2) {
                        continue
                    }
                    if (dataLayer[i][0] == "config") {
                        gtag("event", action, {send_to: dataLayer[i][1], event_category: category});
                        if (dataLayer[i][1].indexOf("G-") == 0 || dataLayer[i][1].indexOf("UA-") == 0) {
                            handled = true
                        }
                    }
                }
            }
            if (!handled) {
                dataLayer.push({event: "gaTriggerEvent", gaEventCategory: category, gaEventAction: action})
            }
        } else if (typeof ga == "function") {
            ga("send", "event", category, action)
        }
    }

    function trackFb(event) {
        if (typeof fbq == "function" && typeof event != "undefined") {
            fbq("trackCustom", event)
        }
    }
};
var TELER_WD_SHOWN = false;
var TelerCatcher = new function () {
    this.getDomain = getDomain;
    this.parseUrl = parseUrl;
    this.createUtm = createUtm;
    this.saveUtmLocal = saveUtmLocal;
    this.getUtm = getUtm;
    this.saveReferrerLocal = saveReferrerLocal;
    this.getReferrer = getReferrer;
    this.getTelerSessionId = getTelerSessionId;
    this.getUniversalAnalyticsId = getUniversalAnalyticsId;
    this.getGa4ClientId = getGa4ClientId;
    this.getClientId = getClientId;
    var searchEngine = [{name: "google", regexp: /^www.google/, termParam: "q"}, {
        name: "yandex",
        regexp: /yandex./,
        termParam: "text"
    }, {name: "go.mail.ru", regexp: /^go.mail.ru$/, termParam: "q"}, {
        name: "bing",
        regexp: /^www.bing/,
        termParam: "q"
    }, {name: "yahoo", regexp: /^search.yahoo/, termParam: "p"}, {
        name: "ask",
        regexp: /ask.com$/,
        termParam: "q"
    }, {name: "rambler", regexp: /rambler.ru$/, termParam: "query"}, {
        name: "ukr.net",
        regexp: /^search.ukr.net$/,
        termParam: "search_query"
    }, {name: "meta.ua", regexp: /^search.meta.ua$/, termParam: "q"}, {
        name: "i.ua",
        regexp: /^search.i.ua$/,
        termParam: "q"
    }, {name: "all.by", regexp: /^all.by$/, termParam: "query"}, {
        name: "search.tut.by",
        regexp: /^search.tut.by$/,
        termParam: "query"
    }];
    var socialNetwork = [{name: "instagram.com", referrer: /instagram.com/}, {
        name: "facebook.com",
        referrer: /facebook.com/
    }, {name: "linkedin", referrer: /linkedin.com/}, {name: "vk.com", referrer: /vk.com/}, {
        name: "twitter.com",
        referrer: /^t.co/
    }, {name: "ok.ru", referrer: /^ok.ru/}, {name: "google+", referrer: /plus.url.google.com/}];

    function createUtm(pageUrl, refUrl) {
        if (!pageUrl) {
            return null
        }
        var qParams = parseUrl(pageUrl);
        var refParam = parseUrl(refUrl);
        var utm;
        utm = {};
        utm.source = qParams.source || "";
        utm.medium = qParams.medium || "";
        utm.campaign = qParams.campaign || "";
        utm.content = qParams.content || "";
        utm.term = qParams.term || "";
        utm.nooverride = qParams.nooverride || "";
        do {
            if (qParams.gclid || qParams.yclid) {
                utm.medium = "cpc";
                utm.source = qParams.gclid ? "google" : "yandex";
                utm.source = (utm.source + "").toLowerCase();
                break
            } else if (refUrl) {
                if (getDomain(refUrl) == getDomain(pageUrl)) {
                    utm.medium = utm.medium || "other";
                    utm.medium = (utm.medium + "").toLowerCase();
                    break
                }
                for (var i = 0; i < searchEngine.length; i++) {
                    if (searchEngine[i].regexp.test(getDomain(refUrl))) {
                        refParam = parseUrl(refUrl, searchEngine[i].termParam);
                        utm.medium = utm.medium || "organic";
                        utm.source = utm.source || searchEngine[i].name;
                        utm.source = (utm.source + "").toLowerCase();
                        utm.term = utm.term || refParam.searchTerm || "";
                        break
                    }
                }
                for (i = 0; i < socialNetwork.length; i++) {
                    if (socialNetwork[i].referrer.test(getDomain(refUrl))) {
                        utm.medium = utm.medium || "social";
                        utm.source = utm.source || socialNetwork[i].name;
                        utm.source = (utm.source + "").toLowerCase();
                        break
                    }
                }
                if (!utm.source) {
                    utm.medium = utm.medium || "referral";
                    utm.source = getDomain(refUrl);
                    utm.content = utm.content || refUrl;
                    utm.term = utm.term || ""
                }
                utm.source = (utm.source + "").toLowerCase()
            } else {
                utm.source = utm.source || "direct"
            }
        } while (false);
        utm.source = utm.source || "(not set)";
        utm.medium = utm.medium || "(not set)";
        utm.campaign = utm.campaign || "(not set)";
        utm.content = utm.content || "(not set)";
        utm.term = utm.term || "(not set)";
        utm.source = (utm.source + "").toLowerCase();
        return utm
    }

    function saveUtmLocal(utm) {
        if (utm.nooverride === "1" && localStorage.getItem("callCatcherUtm")) {
            return
        } else if (localStorage.getItem("callCatcherUtm") && document.referrer.indexOf(getDomain(location.href)) !== -1) {
            return
        } else if (localStorage.getItem("callCatcherUtm") && utm.source === "direct") {
            return
        } else {
            var utmToStorage = JSON.parse(JSON.stringify(utm));
            delete utmToStorage.nooverride;
            localStorage.setItem("callCatcherUtm", JSON.stringify(utmToStorage))
        }
    }

    function getUtm() {
        if (localStorage.getItem("callCatcherUtm") && localStorage.getItem("callCatcherUtm") !== "") {
            return JSON.parse(localStorage.getItem("callCatcherUtm"))
        }
    }

    function getDomain(url) {
        if (!url) {
            return url
        }
        var start = url.indexOf("://");
        start >= 0 && (url = url.slice(start + 3, url.length));
        start = url.indexOf("//");
        start === 0 && (url = url.slice(start + 2, url.length));
        start = url.indexOf("/");
        start === 0 && (url = url.slice(start + 1, url.length));
        var end = url.indexOf("/");
        end > 3 && (url = url.slice(0, end));
        return url
    }

    function parseUrl(url, searchTerm) {
        if (!url || url.indexOf("?") < 0) {
            return {}
        }
        var query = url.substring(url.indexOf("?") + 1);
        return query.split("&").reduce(function (utm, tag) {
            if (tag.substr(0, 4) == "utm_") {
                tag = tag.split("=");
                var key = tag[0].substr(4);
                utm[key] = decodeURIComponent(tag[1]);
                if (utm[key]) {
                    try {
                        utm[key] = decodeURIComponent(utm[key])
                    } catch (m) {
                    }
                }
            } else if (tag.substr(0, 6) == "gclid=") {
                tag = tag.split("=");
                utm.gclid = tag[1]
            } else if (tag.substr(0, 6) == "yclid=") {
                tag = tag.split("=");
                utm.yclid = tag[1]
            } else if (tag.indexOf(searchTerm + "=") == 0) {
                tag = tag.split("=");
                utm.searchTerm = decodeURIComponent(tag[1])
            }
            return utm
        }, {})
    }

    function saveReferrerLocal(utm, referrer, pageUrl) {
        if (utm.source === "direct") {
            return
        }
        if (referrer && referrer.indexOf(getDomain(pageUrl)) === -1) {
            localStorage.setItem("callCatcherReferrer", JSON.stringify(referrer))
        }
    }

    function getReferrer(utm) {
        if (utm.source === "direct") {
            return "(not set)"
        }
        if (localStorage.getItem("callCatcherReferrer") && localStorage.getItem("callCatcherReferrer") !== "") {
            return JSON.parse(localStorage.getItem("callCatcherReferrer"))
        } else {
            return "(not set)"
        }
    }

    function getTelerSessionId() {
        var telerSessionId = TelerWdMiniJS.cookie("TELERSESSIONID");
        if (!telerSessionId) {
            function createGuid() {
                return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
                    var r = Math.random() * 16 | 0, v = c === "x" ? r : r & 3 | 8;
                    return v.toString(16)
                })
            }

            telerSessionId = createGuid();
            var expires = 365;
            TelerWdMiniJS.cookie("TELERSESSIONID", telerSessionId, expires)
        }
        return telerSessionId
    }

    function getUniversalAnalyticsId() {
        if (!window.ga || typeof ga.getAll !== "function") {
            return ""
        } else {
            return ga.getAll()[0].get("trackingId")
        }
    }

    function getGa4ClientId() {
        return TelerWdMiniJS.cookie("_ga")
    }

    function getClientId() {
        return typeof ga != "undefined" && typeof ga.getAll == "function" && ga.getAll().length ? ga.getAll()[ga.getAll().length - 1].get("clientId") : null
    }
};
(function () {
    var LOAD_DELAY_MS = 1500;

    function loadCallbackButton() {
        var ie = navigator.userAgent.match(/MSIE \d*/);
        if (ie && ie[0] && +ie[0].slice(4, 6) < 9 || document.getElementById("__telerWdTriggerContent") || TELER_WD_SHOWN || window.location.hash == "#/?design=1" || window.frameElement && window.frameElement.id == "jivo_magic_iframe") {
            return
        }
        var queryParams = {path: encodeURIComponent(location.pathname)};
        TELER_WD_SHOWN = true;
        TelerWdMiniJS.ajax("//" + telerWdDomain + "/rest/public/widget/call-catchers/" + telerWdWidgetId + "/trigger-content", function (data, resp) {
            if (resp.status != 200 || !data) {
                TELER_WD_SHOWN = false;
                return
            }
            window.telerWdOpts = JSON.parse(data);
            window.telerWdOpts.displayNow && TelerWdMiniJS.toDom(telerWdOpts.content);
            delete telerWdOpts.content;
            delete telerWdOpts.placeholders;
            if (!TelerWdMiniJS.cookie("TELERSESSION_REFERRER")) {
                TelerWdMiniJS.cookie("TELERSESSION_REFERRER", document.referrer, 365)
            }
        }, null, null, queryParams)
    }

    setTimeout(loadCallbackButton, LOAD_DELAY_MS)
})();
