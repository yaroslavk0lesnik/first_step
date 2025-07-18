/*!
 * simpleParallax.min - simpleParallax is a simple JavaScript library that gives your website parallax animations on any images or videos,
 * @date: 09-06-2020 12:9:37,
 * @version: 5.5.1,
 * @link: https://simpleparallax.com/
 */
!function(t, e) {
    "object" == typeof exports && "object" == typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define("simpleParallax", [], e) : "object" == typeof exports ? exports.simpleParallax = e() : t.simpleParallax = e()
}(window, (function() {
        return function(t) {
            var e = {};
            function n(i) {
                if (e[i])
                    return e[i].exports;
                var o = e[i] = {
                    i: i,
                    l: !1,
                    exports: {}
                };
                return t[i].call(o.exports, o, o.exports, n),
                    o.l = !0,
                    o.exports
            }
            return n.m = t,
                n.c = e,
                n.d = function(t, e, i) {
                    n.o(t, e) || Object.defineProperty(t, e, {
                        enumerable: !0,
                        get: i
                    })
                }
                ,
                n.r = function(t) {
                    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
                        value: "Module"
                    }),
                        Object.defineProperty(t, "__esModule", {
                            value: !0
                        })
                }
                ,
                n.t = function(t, e) {
                    if (1 & e && (t = n(t)),
                    8 & e)
                        return t;
                    if (4 & e && "object" == typeof t && t && t.__esModule)
                        return t;
                    var i = Object.create(null);
                    if (n.r(i),
                        Object.defineProperty(i, "default", {
                            enumerable: !0,
                            value: t
                        }),
                    2 & e && "string" != typeof t)
                        for (var o in t)
                            n.d(i, o, function(e) {
                                return t[e]
                            }
                                .bind(null, o));
                    return i
                }
                ,
                n.n = function(t) {
                    var e = t && t.__esModule ? function() {
                            return t.default
                        }
                        : function() {
                            return t
                        }
                    ;
                    return n.d(e, "a", e),
                        e
                }
                ,
                n.o = function(t, e) {
                    return Object.prototype.hasOwnProperty.call(t, e)
                }
                ,
                n.p = "",
                n(n.s = 0)
        }([function(t, e, n) {
            "use strict";
            n.r(e),
                n.d(e, "default", (function() {
                        return x
                    }
                ));
            var i = function() {
                return Element.prototype.closest && "IntersectionObserver"in window
            };
            function o(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    i.enumerable = i.enumerable || !1,
                        i.configurable = !0,
                    "value"in i && (i.writable = !0),
                        Object.defineProperty(t, i.key, i)
                }
            }
            var s = new (function() {
                function t() {
                    !function(t, e) {
                        if (!(t instanceof e))
                            throw new TypeError("Cannot call a class as a function")
                    }(this, t),
                        this.positions = {
                            top: 0,
                            bottom: 0,
                            height: 0
                        }
                }
                var e, n, i;
                return e = t,
                (n = [{
                    key: "setViewportTop",
                    value: function(t) {
                        return this.positions.top = t ? t.scrollTop : window.pageYOffset,
                            this.positions
                    }
                }, {
                    key: "setViewportBottom",
                    value: function() {
                        return this.positions.bottom = this.positions.top + this.positions.height,
                            this.positions
                    }
                }, {
                    key: "setViewportAll",
                    value: function(t) {
                        return this.positions.top = t ? t.scrollTop : window.pageYOffset,
                            this.positions.height = t ? t.clientHeight : document.documentElement.clientHeight,
                            this.positions.bottom = this.positions.top + this.positions.height,
                            this.positions
                    }
                }]) && o(e.prototype, n),
                i && o(e, i),
                    t
            }())
                , r = function(t) {
                return NodeList.prototype.isPrototypeOf(t) || HTMLCollection.prototype.isPrototypeOf(t) ? Array.from(t) : "string" == typeof t || t instanceof String ? document.querySelectorAll(t) : [t]
            }
                , a = function() {
                for (var t, e = "transform webkitTransform mozTransform oTransform msTransform".split(" "), n = 0; void 0 === t; )
                    t = void 0 !== document.createElement("div").style[e[n]] ? e[n] : void 0,
                        n += 1;
                return t
            }()
                , l = function(t) {
                return "video" === t.tagName.toLowerCase() || !!t && (!!t.complete && (void 0 === t.naturalWidth || 0 !== t.naturalWidth))
            };
            function u(t) {
                return function(t) {
                    if (Array.isArray(t))
                        return c(t)
                }(t) || function(t) {
                    if ("undefined" != typeof Symbol && Symbol.iterator in Object(t))
                        return Array.from(t)
                }(t) || function(t, e) {
                    if (!t)
                        return;
                    if ("string" == typeof t)
                        return c(t, e);
                    var n = Object.prototype.toString.call(t).slice(8, -1);
                    "Object" === n && t.constructor && (n = t.constructor.name);
                    if ("Map" === n || "Set" === n)
                        return Array.from(t);
                    if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
                        return c(t, e)
                }(t) || function() {
                    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }()
            }
            function c(t, e) {
                (null == e || e > t.length) && (e = t.length);
                for (var n = 0, i = new Array(e); n < e; n++)
                    i[n] = t[n];
                return i
            }
            function h(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    i.enumerable = i.enumerable || !1,
                        i.configurable = !0,
                    "value"in i && (i.writable = !0),
                        Object.defineProperty(t, i.key, i)
                }
            }
            var f = function() {
                function t(e, n) {
                    var i = this;
                    !function(t, e) {
                        if (!(t instanceof e))
                            throw new TypeError("Cannot call a class as a function")
                    }(this, t),
                        this.element = e,
                        this.elementContainer = e,
                        this.settings = n,
                        this.isVisible = !0,
                        this.isInit = !1,
                        this.oldTranslateValue = -1,
                        this.init = this.init.bind(this),
                        l(e) ? this.init() : this.element.addEventListener("load", (function() {
                                setTimeout((function() {
                                        i.init(!0)
                                    }
                                ), 50)
                            }
                        ))
                }
                var e, n, i;
                return e = t,
                (n = [{
                    key: "init",
                    value: function(t) {
                        var e = this;
                        this.isInit || (t && (this.rangeMax = null),
                        this.element.closest(".simpleParallax") || (!1 === this.settings.overflow && this.wrapElement(this.element),
                            this.setTransformCSS(),
                            this.getElementOffset(),
                            this.intersectionObserver(),
                            this.getTranslateValue(),
                            this.animate(),
                        this.settings.delay > 0 && setTimeout((function() {
                                e.setTransitionCSS()
                            }
                        ), 10),
                            this.isInit = !0))
                    }
                }, {
                    key: "wrapElement",
                    value: function() {
                        var t = this.settings.customWrapper && this.element.closest(this.settings.customWrapper)
                            , e = this.element.closest("picture") || this.element
                            , n = document.createElement("div");
                        t && (n = this.element.closest(this.settings.customWrapper)),
                            n.classList.add("simpleParallax"),
                            n.style.overflow = "hidden",
                        t || (e.parentNode.insertBefore(n, e),
                            n.appendChild(e)),
                            this.elementContainer = n
                    }
                }, {
                    key: "unWrapElement",
                    value: function() {
                        var t = this.elementContainer;
                        this.settings.customWrapper && this.element.closest(this.settings.customWrapper) ? (t.classList.remove("simpleParallax"),
                            t.style.overflow = "") : t.replaceWith.apply(t, u(t.childNodes))
                    }
                }, {
                    key: "setTransformCSS",
                    value: function() {
                        !1 === this.settings.overflow && (this.element.style[a] = "scale(".concat(this.settings.scale, ")")),
                            this.element.style.willChange = "transform"
                    }
                }, {
                    key: "setTransitionCSS",
                    value: function() {
                        this.element.style.transition = "transform ".concat(this.settings.delay, "s ").concat(this.settings.transition)
                    }
                }, {
                    key: "unSetStyle",
                    value: function() {
                        this.element.style.willChange = "",
                            this.element.style[a] = "",
                            this.element.style.transition = ""
                    }
                }, {
                    key: "getElementOffset",
                    value: function() {
                        var t = this.elementContainer.getBoundingClientRect();
                        if (this.elementHeight = t.height,
                            this.elementTop = t.top + s.positions.top,
                            this.settings.customContainer) {
                            var e = this.settings.customContainer.getBoundingClientRect();
                            this.elementTop = t.top - e.top + s.positions.top
                        }
                        this.elementBottom = this.elementHeight + this.elementTop
                    }
                }, {
                    key: "buildThresholdList",
                    value: function() {
                        for (var t = [], e = 1; e <= this.elementHeight; e++) {
                            var n = e / this.elementHeight;
                            t.push(n)
                        }
                        return t
                    }
                }, {
                    key: "intersectionObserver",
                    value: function() {
                        var t = {
                            root: null,
                            threshold: this.buildThresholdList()
                        };
                        this.observer = new IntersectionObserver(this.intersectionObserverCallback.bind(this),t),
                            this.observer.observe(this.element)
                    }
                }, {
                    key: "intersectionObserverCallback",
                    value: function(t) {
                        var e = this;
                        t.forEach((function(t) {
                                t.isIntersecting ? e.isVisible = !0 : e.isVisible = !1
                            }
                        ))
                    }
                }, {
                    key: "checkIfVisible",
                    value: function() {
                        return this.elementBottom > s.positions.top && this.elementTop < s.positions.bottom
                    }
                }, {
                    key: "getRangeMax",
                    value: function() {
                        var t = this.element.clientHeight;
                        this.rangeMax = t * this.settings.scale - t
                    }
                }, {
                    key: "getTranslateValue",
                    value: function() {
                        var t = ((s.positions.bottom - this.elementTop) / ((s.positions.height + this.elementHeight) / 100)).toFixed(1);
                        return t = Math.min(100, Math.max(0, t)),
                        0 !== this.settings.maxTransition && t > this.settings.maxTransition && (t = this.settings.maxTransition),
                        this.oldPercentage !== t && (this.rangeMax || this.getRangeMax(),
                            this.translateValue = (t / 100 * this.rangeMax - this.rangeMax / 2).toFixed(0),
                        this.oldTranslateValue !== this.translateValue && (this.oldPercentage = t,
                            this.oldTranslateValue = this.translateValue,
                            !0))
                    }
                }, {
                    key: "animate",
                    value: function() {
                        var t, e = 0, n = 0;
                        (this.settings.orientation.includes("left") || this.settings.orientation.includes("right")) && (n = "".concat(this.settings.orientation.includes("left") ? -1 * this.translateValue : this.translateValue, "px")),
                        (this.settings.orientation.includes("up") || this.settings.orientation.includes("down")) && (e = "".concat(this.settings.orientation.includes("up") ? -1 * this.translateValue : this.translateValue, "px")),
                            t = !1 === this.settings.overflow ? "translate3d(".concat(n, ", ").concat(e, ", 0) scale(").concat(this.settings.scale, ")") : "translate3d(".concat(n, ", ").concat(e, ", 0)"),
                            this.element.style[a] = t
                    }
                }]) && h(e.prototype, n),
                i && h(e, i),
                    t
            }();
            function m(t) {
                return function(t) {
                    if (Array.isArray(t))
                        return y(t)
                }(t) || function(t) {
                    if ("undefined" != typeof Symbol && Symbol.iterator in Object(t))
                        return Array.from(t)
                }(t) || d(t) || function() {
                    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }()
            }
            function p(t, e) {
                return function(t) {
                    if (Array.isArray(t))
                        return t
                }(t) || function(t, e) {
                    if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(t)))
                        return;
                    var n = []
                        , i = !0
                        , o = !1
                        , s = void 0;
                    try {
                        for (var r, a = t[Symbol.iterator](); !(i = (r = a.next()).done) && (n.push(r.value),
                        !e || n.length !== e); i = !0)
                            ;
                    } catch (t) {
                        o = !0,
                            s = t
                    } finally {
                        try {
                            i || null == a.return || a.return()
                        } finally {
                            if (o)
                                throw s
                        }
                    }
                    return n
                }(t, e) || d(t, e) || function() {
                    throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }()
            }
            function d(t, e) {
                if (t) {
                    if ("string" == typeof t)
                        return y(t, e);
                    var n = Object.prototype.toString.call(t).slice(8, -1);
                    return "Object" === n && t.constructor && (n = t.constructor.name),
                        "Map" === n || "Set" === n ? Array.from(t) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? y(t, e) : void 0
                }
            }
            function y(t, e) {
                (null == e || e > t.length) && (e = t.length);
                for (var n = 0, i = new Array(e); n < e; n++)
                    i[n] = t[n];
                return i
            }
            function v(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    i.enumerable = i.enumerable || !1,
                        i.configurable = !0,
                    "value"in i && (i.writable = !0),
                        Object.defineProperty(t, i.key, i)
                }
            }
            var g, b, w = !1, T = [], x = function() {
                function t(e, n) {
                    if (function(t, e) {
                        if (!(t instanceof e))
                            throw new TypeError("Cannot call a class as a function")
                    }(this, t),
                    e && i()) {
                        if (this.elements = r(e),
                            this.defaults = {
                                delay: 0,
                                orientation: "up",
                                scale: 1.3,
                                overflow: !1,
                                transition: "cubic-bezier(0,0,0,1)",
                                customContainer: !1,
                                customWrapper: !1,
                                maxTransition: 0
                            },
                            this.settings = Object.assign(this.defaults, n),
                            this.settings.customContainer) {
                            var o = p(r(this.settings.customContainer), 1);
                            this.customContainer = o[0]
                        }
                        this.lastPosition = -1,
                            this.resizeIsDone = this.resizeIsDone.bind(this),
                            this.refresh = this.refresh.bind(this),
                            this.proceedRequestAnimationFrame = this.proceedRequestAnimationFrame.bind(this),
                            this.init()
                    }
                }
                var e, n, o;
                return e = t,
                (n = [{
                    key: "init",
                    value: function() {
                        var t = this;
                        s.setViewportAll(this.customContainer),
                            T = [].concat(m(this.elements.map((function(e) {
                                    return new f(e,t.settings)
                                }
                            ))), m(T)),
                        w || (this.proceedRequestAnimationFrame(),
                            window.addEventListener("resize", this.resizeIsDone),
                            w = !0)
                    }
                }, {
                    key: "resizeIsDone",
                    value: function() {
                        clearTimeout(b),
                            b = setTimeout(this.refresh, 200)
                    }
                }, {
                    key: "proceedRequestAnimationFrame",
                    value: function() {
                        var t = this;
                        s.setViewportTop(this.customContainer),
                            this.lastPosition !== s.positions.top ? (s.setViewportBottom(),
                                T.forEach((function(e) {
                                        t.proceedElement(e)
                                    }
                                )),
                                g = window.requestAnimationFrame(this.proceedRequestAnimationFrame),
                                this.lastPosition = s.positions.top) : g = window.requestAnimationFrame(this.proceedRequestAnimationFrame)
                    }
                }, {
                    key: "proceedElement",
                    value: function(t) {
                        (this.customContainer ? t.checkIfVisible() : t.isVisible) && t.getTranslateValue() && t.animate()
                    }
                }, {
                    key: "refresh",
                    value: function() {
                        s.setViewportAll(this.customContainer),
                            T.forEach((function(t) {
                                    t.getElementOffset(),
                                        t.getRangeMax()
                                }
                            )),
                            this.lastPosition = -1
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        var t = this
                            , e = [];
                        T = T.filter((function(n) {
                                return t.elements.includes(n.element) ? (e.push(n),
                                    !1) : n
                            }
                        )),
                            e.forEach((function(e) {
                                    e.unSetStyle(),
                                    !1 === t.settings.overflow && e.unWrapElement()
                                }
                            )),
                        T.length || (window.cancelAnimationFrame(g),
                            window.removeEventListener("resize", this.refresh))
                    }
                }]) && v(e.prototype, n),
                o && v(e, o),
                    t
            }()
        }
        ]).default
    }
));
