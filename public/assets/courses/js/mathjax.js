! function(n) {
    var r = {};

    function o(e) { if (r[e]) return r[e].exports; var t = r[e] = { i: e, l: !1, exports: {} }; return n[e].call(t.exports, t, t.exports, o), t.l = !0, t.exports }
    o.m = n, o.c = r, o.d = function(e, t, n) { o.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: n }) }, o.r = function(e) { "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 }) }, o.t = function(t, e) {
        if (1 & e && (t = o(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var n = Object.create(null);
        if (o.r(n), Object.defineProperty(n, "default", { enumerable: !0, value: t }), 2 & e && "string" != typeof t)
            for (var r in t) o.d(n, r, function(e) { return t[e] }.bind(null, r));
        return n
    }, o.n = function(e) { var t = e && e.__esModule ? function() { return e.default } : function() { return e }; return o.d(t, "a", t), t }, o.o = function(e, t) { return Object.prototype.hasOwnProperty.call(e, t) }, o.p = "", o(o.s = 6)
}([function(e, d, a) {
    "use strict";
    (function(n) {
        var s = this && this.__values || function(e) {
            var t = "function" == typeof Symbol && Symbol.iterator,
                n = t && e[t],
                r = 0;
            if (n) return n.call(e);
            if (e && "number" == typeof e.length) return { next: function() { return e && r >= e.length && (e = void 0), { value: e && e[r++], done: !e } } };
            throw new TypeError(t ? "Object is not iterable." : "Symbol.iterator is not defined.")
        };
        Object.defineProperty(d, "__esModule", { value: !0 });
        var e, t, r = a(1),
            l = a(2),
            o = a(2);
        d.Package = o.Package, d.PackageError = o.PackageError, (t = e = d.Loader || (d.Loader = {})).ready = function() {
            for (var t, e, n = [], r = 0; r < arguments.length; r++) n[r] = arguments[r];
            0 === n.length && (n = Array.from(l.Package.packages.keys()));
            var o = [];
            try {
                for (var a = s(n), i = a.next(); !i.done; i = a.next()) {
                    var u = i.value,
                        c = l.Package.packages.get(u) || new l.Package(u, !0);
                    o.push(c.promise)
                }
            } catch (e) { t = { error: e } } finally { try { i && !i.done && (e = a.return) && e.call(a) } finally { if (t) throw t.error } }
            return Promise.all(o)
        }, t.load = function() {
            for (var t, e, n = [], r = 0; r < arguments.length; r++) n[r] = arguments[r];
            if (0 === n.length) return Promise.resolve();
            var o = [];
            try {
                for (var a = s(n), i = a.next(); !i.done; i = a.next()) {
                    var u = i.value,
                        c = l.Package.packages.get(u);
                    c || (c = new l.Package(u)).provides(d.CONFIG.provides[u]), c.checkNoLoad(), o.push(c.promise)
                }
            } catch (e) { t = { error: e } } finally { try { i && !i.done && (e = a.return) && e.call(a) } finally { if (t) throw t.error } }
            return l.Package.loadAll(), Promise.all(o)
        }, t.preLoad = function() {
            for (var t, e, n = [], r = 0; r < arguments.length; r++) n[r] = arguments[r];
            try {
                for (var o = s(n), a = o.next(); !a.done; a = o.next()) {
                    var i = a.value,
                        u = l.Package.packages.get(i);
                    u || (u = new l.Package(i, !0)).provides(d.CONFIG.provides[i]), u.loaded()
                }
            } catch (e) { t = { error: e } } finally { try { a && !a.done && (e = o.return) && e.call(o) } finally { if (t) throw t.error } }
        }, t.defaultReady = function() { void 0 !== d.MathJax.startup && d.MathJax.config.startup.ready() }, t.getRoot = function() {
            var e = n + "/../../es5";
            if ("undefined" != typeof document) {
                var t = document.currentScript || document.getElementById("MathJax-script");
                t && (e = t.src.replace(/\/[^\/]*$/, ""))
            }
            return e
        }, d.MathJax = r.MathJax, void 0 === d.MathJax.loader && (r.combineDefaults(d.MathJax.config, "loader", { paths: { mathjax: e.getRoot() }, source: {}, dependencies: {}, provides: {}, load: [], ready: e.defaultReady.bind(e), failed: function(e) { return console.log("MathJax(" + (e.package || "?") + "): " + e.message) }, require: null }), r.combineWithMathJax({ loader: e })), d.CONFIG = d.MathJax.config.loader
    }).call(this, "/")
}, function(e, t, n) {
    "use strict";
    (function(e) {
        var s = this && this.__values || function(e) {
            var t = "function" == typeof Symbol && Symbol.iterator,
                n = t && e[t],
                r = 0;
            if (n) return n.call(e);
            if (e && "number" == typeof e.length) return { next: function() { return e && r >= e.length && (e = void 0), { value: e && e[r++], done: !e } } };
            throw new TypeError(t ? "Object is not iterable." : "Symbol.iterator is not defined.")
        };

        function l(e) { return "object" == typeof e && null !== e }

        function u(e, t) { var n, r; try { for (var o = s(Object.keys(t)), a = o.next(); !a.done; a = o.next()) { var i = a.value; "__esModule" !== i && (!l(e[i]) || !l(t[i]) || t[i] instanceof Promise ? null !== t[i] && void 0 !== t[i] && (e[i] = t[i]) : u(e[i], t[i])) } } catch (e) { n = { error: e } } finally { try { a && !a.done && (r = o.return) && r.call(o) } finally { if (n) throw n.error } } return e }
        Object.defineProperty(t, "__esModule", { value: !0 }), t.isObject = l, t.combineConfig = u, t.combineDefaults = function e(t, n, r) {
            var o, a;
            t[n] || (t[n] = {}), t = t[n];
            try {
                for (var i = s(Object.keys(r)), u = i.next(); !u.done; u = i.next()) {
                    var c = u.value;
                    l(t[c]) && l(r[c]) ? e(t, c, r[c]) : null == t[c] && null != r[c] && (t[c] = r[c])
                }
            } catch (e) { o = { error: e } } finally { try { u && !u.done && (a = i.return) && a.call(i) } finally { if (o) throw o.error } }
            return t
        }, t.combineWithMathJax = function(e) { return u(t.MathJax, e) }, void 0 === e.MathJax && (e.MathJax = {}), e.MathJax.version || (e.MathJax = { version: "3.0.5", _: {}, config: e.MathJax }), t.MathJax = e.MathJax
    }).call(this, n(3))
}, function(e, t, n) {
    "use strict";
    var r, o = this && this.__extends || (r = function(e, t) {
            return (r = Object.setPrototypeOf || { __proto__: [] }
                instanceof Array && function(e, t) { e.__proto__ = t } || function(e, t) { for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]) })(e, t)
        }, function(e, t) {
            function n() { this.constructor = e }
            r(e, t), e.prototype = null === t ? Object.create(t) : (n.prototype = t.prototype, new n)
        }),
        a = this && this.__read || function(e, t) {
            var n = "function" == typeof Symbol && e[Symbol.iterator];
            if (!n) return e;
            var r, o, a = n.call(e),
                i = [];
            try {
                for (;
                    (void 0 === t || 0 < t--) && !(r = a.next()).done;) i.push(r.value)
            } catch (e) { o = { error: e } } finally { try { r && !r.done && (n = a.return) && n.call(a) } finally { if (o) throw o.error } }
            return i
        },
        d = this && this.__spread || function() { for (var e = [], t = 0; t < arguments.length; t++) e = e.concat(a(arguments[t])); return e },
        f = this && this.__values || function(e) {
            var t = "function" == typeof Symbol && Symbol.iterator,
                n = t && e[t],
                r = 0;
            if (n) return n.call(e);
            if (e && "number" == typeof e.length) return { next: function() { return e && r >= e.length && (e = void 0), { value: e && e[r++], done: !e } } };
            throw new TypeError(t ? "Object is not iterable." : "Symbol.iterator is not defined.")
        };
    Object.defineProperty(t, "__esModule", { value: !0 });
    var i, h = n(0),
        u = (i = Error, o(c, i), c);

    function c(e, t) { var n = i.call(this, e) || this; return n.package = t, n }
    t.PackageError = u;
    var s = (p.resolvePath = function(e, t) {
        void 0 === t && (t = !0);
        var n, r = h.CONFIG.source[e] || e;
        for (r.match(/^(?:[a-z]+:\/)?\/|\[|[a-z]:\\/i) || (r = "[mathjax]/" + r.replace(/^\.\//, "")), t && !r.match(/\.[^\/]+$/) && (r += ".js");
            (n = r.match(/^\[([^\]]*)\]/)) && h.CONFIG.paths.hasOwnProperty(n[1]);) r = h.CONFIG.paths[n[1]] + r.substr(n[0].length);
        return r
    }, Object.defineProperty(p.prototype, "canLoad", { get: function() { return 0 === this.dependencyCount && !this.noLoad && !this.isLoading && !this.hasFailed }, enumerable: !0, configurable: !0 }), p.prototype.makeDependencies = function() {
        var t, e, n = [],
            r = p.packages,
            o = this.noLoad,
            a = this.name,
            i = [];
        h.CONFIG.dependencies.hasOwnProperty(a) ? i.push.apply(i, d(h.CONFIG.dependencies[a])) : "core" !== a && i.push("core");
        try {
            for (var u = f(i), c = u.next(); !c.done; c = u.next()) {
                var s = c.value,
                    l = r.get(s) || new p(s, o);
                this.dependencies.indexOf(l) < 0 && (l.addDependent(this, o), this.dependencies.push(l), l.isLoaded || (this.dependencyCount++, n.push(l.promise)))
            }
        } catch (e) { t = { error: e } } finally { try { c && !c.done && (e = u.return) && e.call(u) } finally { if (t) throw t.error } }
        return n
    }, p.prototype.makePromise = function(e) {
        var n = this,
            t = new Promise(function(e, t) { n.resolve = e, n.reject = t }),
            r = h.CONFIG[this.name] || {};
        return r.ready && (t = t.then(function(e) { return r.ready(n.name) })), e.length && (e.push(t), t = Promise.all(e).then(function(e) { return e.join(", ") })), r.failed && t.catch(function(e) { return r.failed(new u(e, n.name)) }), t
    }, p.prototype.load = function() {
        if (!this.isLoaded && !this.isLoading && !this.noLoad) {
            this.isLoading = !0;
            var e = p.resolvePath(this.name);
            h.CONFIG.require ? this.loadCustom(e) : this.loadScript(e)
        }
    }, p.prototype.loadCustom = function(e) {
        var t = this;
        try {
            var n = h.CONFIG.require(e);
            n instanceof Promise ? n.then(function() { return t.checkLoad() }).catch(function() { return t.failed("Can't load \"" + e + '"') }) : this.checkLoad()
        } catch (e) { this.failed(e.message) }
    }, p.prototype.loadScript = function(t) {
        var n = this,
            e = document.createElement("script");
        e.src = t, e.charset = "UTF-8", e.onload = function(e) { return n.checkLoad() }, e.onerror = function(e) { return n.failed("Can't load \"" + t + '"') }, document.head.appendChild(e)
    }, p.prototype.loaded = function() {
        var t, e, n, r;
        this.isLoaded = !0, this.isLoading = !1;
        try { for (var o = f(this.dependents), a = o.next(); !a.done; a = o.next()) a.value.requirementSatisfied() } catch (e) { t = { error: e } } finally { try { a && !a.done && (e = o.return) && e.call(o) } finally { if (t) throw t.error } }
        try { for (var i = f(this.provided), u = i.next(); !u.done; u = i.next()) u.value.loaded() } catch (e) { n = { error: e } } finally { try { u && !u.done && (r = i.return) && r.call(i) } finally { if (n) throw n.error } }
        this.resolve(this.name)
    }, p.prototype.failed = function(e) { this.hasFailed = !0, this.isLoading = !1, this.reject(new u(e, this.name)) }, p.prototype.checkLoad = function() {
        var t = this;
        ((h.CONFIG[this.name] || {}).checkReady || function() { return Promise.resolve() })().then(function() { return t.loaded() }).catch(function(e) { return t.failed(e) })
    }, p.prototype.requirementSatisfied = function() { this.dependencyCount && (this.dependencyCount--, this.canLoad && this.load()) }, p.prototype.provides = function(e) {
        var t, n;
        void 0 === e && (e = []);
        try {
            for (var r = f(e), o = r.next(); !o.done; o = r.next()) {
                var a = o.value,
                    i = p.packages.get(a);
                i || (h.CONFIG.dependencies[a] || (h.CONFIG.dependencies[a] = []), h.CONFIG.dependencies[a].push(a), (i = new p(a, !0)).isLoading = !0), this.provided.push(i)
            }
        } catch (e) { t = { error: e } } finally { try { o && !o.done && (n = r.return) && n.call(r) } finally { if (t) throw t.error } }
    }, p.prototype.addDependent = function(e, t) { this.dependents.push(e), t || this.checkNoLoad() }, p.prototype.checkNoLoad = function() { var t, e; if (this.noLoad) { this.noLoad = !1; try { for (var n = f(this.dependencies), r = n.next(); !r.done; r = n.next()) r.value.checkNoLoad() } catch (e) { t = { error: e } } finally { try { r && !r.done && (e = n.return) && e.call(n) } finally { if (t) throw t.error } } } }, p.loadAll = function() {
        var t, e;
        try {
            for (var n = f(this.packages.values()), r = n.next(); !r.done; r = n.next()) {
                var o = r.value;
                o.canLoad && o.load()
            }
        } catch (e) { t = { error: e } } finally { try { r && !r.done && (e = n.return) && e.call(n) } finally { if (t) throw t.error } }
    }, p.packages = new Map, p);

    function p(e, t) { void 0 === t && (t = !1), this.isLoaded = !1, this.isLoading = !1, this.hasFailed = !1, this.dependents = [], this.dependencies = [], this.dependencyCount = 0, this.provided = [], this.name = e, this.noLoad = t, p.packages.set(e, this), this.promise = this.makePromise(this.makeDependencies()) }
    t.Package = s
}, function(e, t) {
    var n;
    n = function() { return this }();
    try { n = n || new Function("return this")() } catch (e) { "object" == typeof window && (n = window) }
    e.exports = n
}, function(e, w, C) {
    "use strict";
    (function(o) {
        var t = this && this.__assign || function() {
                return (t = Object.assign || function(e) {
                    for (var t, n = 1, r = arguments.length; n < r; n++)
                        for (var o in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, o) && (e[o] = t[o]);
                    return e
                }).apply(this, arguments)
            },
            u = this && this.__values || function(e) {
                var t = "function" == typeof Symbol && Symbol.iterator,
                    n = t && e[t],
                    r = 0;
                if (n) return n.call(e);
                if (e && "number" == typeof e.length) return { next: function() { return e && r >= e.length && (e = void 0), { value: e && e[r++], done: !e } } };
                throw new TypeError(t ? "Object is not iterable." : "Symbol.iterator is not defined.")
            };
        Object.defineProperty(w, "__esModule", { value: !0 });
        var e, c, n, a, s, r = C(1),
            i = C(5);

        function l(e) { return n.visitTree(e, c.document) }

        function d() { n = new w.MathJax._.core.MmlTree.SerializedMmlVisitor.SerializedMmlVisitor, a = w.MathJax._.mathjax.mathjax, c.input = x(), c.output = v(), c.adaptor = b(), c.handler && a.handlers.unregister(c.handler), c.handler = g(), c.handler && (a.handlers.register(c.handler), c.document = O()) }

        function f() {
            var t, e;
            c.input && c.output && h();
            var n = c.output ? c.output.name.toLowerCase() : "";
            try {
                for (var r = u(c.input), o = r.next(); !o.done; o = r.next()) {
                    var a = o.value,
                        i = a.name.toLowerCase();
                    m(i, a), y(i, a), c.output && p(i, n, a)
                }
            } catch (e) { t = { error: e } } finally { try { o && !o.done && (e = r.return) && e.call(r) } finally { if (t) throw t.error } }
        }

        function h() { w.MathJax.typeset = function(e) { void 0 === e && (e = null), c.document.options.elements = e, c.document.reset(), c.document.render() }, w.MathJax.typesetPromise = function(e) { return void 0 === e && (e = null), c.document.options.elements = e, c.document.reset(), a.handleRetriesFor(function() { c.document.render() }) }, w.MathJax.typesetClear = function() { return c.document.clear() } }

        function p(e, t, n) {
            var r = e + "2" + t;
            w.MathJax[r] = function(e, t) { return void 0 === t && (t = {}), t.format = n.name, c.document.convert(e, t) }, w.MathJax[r + "Promise"] = function(e, t) { return void 0 === t && (t = {}), t.format = n.name, a.handleRetriesFor(function() { return c.document.convert(e, t) }) }, w.MathJax[t + "Stylesheet"] = function() { return c.output.styleSheet(c.document) }, "getMetricsFor" in c.output && (w.MathJax.getMetricsFor = function(e, t) { return c.output.getMetricsFor(e, t) })
        }

        function m(e, n) {
            var r = w.MathJax._.core.MathItem.STATE;
            w.MathJax[e + "2mml"] = function(e, t) { return void 0 === t && (t = {}), t.end = r.CONVERT, t.format = n.name, l(c.document.convert(e, t)) }, w.MathJax[e + "2mmlPromise"] = function(e, t) { return void 0 === t && (t = {}), t.end = r.CONVERT, t.format = n.name, a.handleRetriesFor(function() { return l(c.document.convert(e, t)) }) }
        }

        function y(e, t) { "tex" === e && (w.MathJax.texReset = function(e) { return void 0 === e && (e = 0), t.parseOptions.tags.reset(e) }) }

        function x() {
            var t, e, n = [];
            try {
                for (var r = u(w.CONFIG.input), o = r.next(); !o.done; o = r.next()) {
                    var a = o.value,
                        i = c.constructors[a];
                    if (!i) throw Error('Input Jax "' + a + '" is not defined (has it been loaded?)');
                    n.push(new i(w.MathJax.config[a]))
                }
            } catch (e) { t = { error: e } } finally { try { o && !o.done && (e = r.return) && e.call(r) } finally { if (t) throw t.error } }
            return n
        }

        function v() { var e = w.CONFIG.output; if (!e) return null; var t = c.constructors[e]; if (!t) throw Error('Output Jax "' + e + '" is not defined (has it been loaded?)'); return new t(w.MathJax.config[e]) }

        function b() { var e = w.CONFIG.adaptor; if (!e || "none" === e) return null; var t = c.constructors[e]; if (!t) throw Error('DOMAdaptor "' + e + '" is not defined (has it been loaded?)'); return t(w.MathJax.config[e]) }

        function g() { var t, e, n = w.CONFIG.handler; if (!n || "none" === n || !c.adaptor) return null; var r = c.constructors[n]; if (!r) throw Error('Handler "' + n + '" is not defined (has it been loaded?)'); var o = new r(c.adaptor, 5); try { for (var a = u(s), i = a.next(); !i.done; i = a.next()) { o = i.value.item(o) } } catch (e) { t = { error: e } } finally { try { i && !i.done && (e = a.return) && e.call(a) } finally { if (t) throw t.error } } return o }

        function O(e) { return void 0 === e && (e = null), a.document(e || w.CONFIG.document, t(t({}, w.MathJax.config.options), { InputJax: c.input, OutputJax: c.output })) }
        c = e = w.Startup || (w.Startup = {}), s = new i.PrioritizedList, c.constructors = {}, c.input = [], c.output = null, c.handler = null, c.adaptor = null, c.elements = null, c.document = null, c.promise = new Promise(function(e, t) {
            var n = o.document;
            if (n && n.readyState && "complete" !== n.readyState && "interactive" !== n.readyState) {
                var r = function() { return e() };
                n.defaultView.addEventListener("load", r, !0), n.defaultView.addEventListener("DOMContentLoaded", r, !0)
            } else e()
        }), c.toMML = l, c.registerConstructor = function(e, t) { c.constructors[e] = t }, c.useHandler = function(e, t) { void 0 === t && (t = !1), w.CONFIG.handler && !t || (w.CONFIG.handler = e) }, c.useAdaptor = function(e, t) { void 0 === t && (t = !1), w.CONFIG.adaptor && !t || (w.CONFIG.adaptor = e) }, c.useInput = function(e, t) { void 0 === t && (t = !1), M && !t || w.CONFIG.input.push(e) }, c.useOutput = function(e, t) { void 0 === t && (t = !1), w.CONFIG.output && !t || (w.CONFIG.output = e) }, c.extendHandler = function(e, t) { void 0 === t && (t = 10), s.add(e, t) }, c.defaultReady = function() { d(), f(), c.promise = c.promise.then(function() { return w.CONFIG.pageReady() }) }, c.defaultPageReady = function() { return w.CONFIG.typeset && w.MathJax.typesetPromise ? w.MathJax.typesetPromise(w.CONFIG.elements) : null }, c.getComponents = d, c.makeMethods = f, c.makeTypesetMethods = h, c.makeOutputMethods = p, c.makeMmlMethods = m, c.makeResetMethod = y, c.getInputJax = x, c.getOutputJax = v, c.getAdaptor = b, c.getHandler = g, c.getDocument = O, w.MathJax = r.MathJax, void 0 === w.MathJax._.startup && (r.combineDefaults(w.MathJax.config, "startup", { input: [], output: "", handler: null, adaptor: null, document: "undefined" == typeof document ? "" : document, elements: null, typeset: !0, ready: e.defaultReady.bind(e), pageReady: e.defaultPageReady.bind(e) }), r.combineWithMathJax({ startup: e, options: {} })), w.CONFIG = w.MathJax.config.startup;
        var M = 0 !== w.CONFIG.input.length
    }).call(this, C(3))
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", { value: !0 });
    var r = (o.prototype[Symbol.iterator] = function() {
        var e = 0,
            t = this.items;
        return { next: function() { return { value: t[e++], done: e > t.length } } }
    }, o.prototype.add = function(e, t) { void 0 === t && (t = o.DEFAULTPRIORITY); for (var n = this.items.length; 0 <= --n && t < this.items[n].priority;); return this.items.splice(n + 1, 0, { item: e, priority: t }), e }, o.prototype.remove = function(e) {
        for (var t = this.items.length; 0 <= --t && this.items[t].item !== e;);
        0 <= t && this.items.splice(t, 1)
    }, o.prototype.toArray = function() { return Array.from(this) }, o.DEFAULTPRIORITY = 5, o);

    function o() { this.items = [], this.items = [] }
    t.PrioritizedList = r
}, function(e, t, n) {
    "use strict";
    n.r(t);
    var r = n(1),
        o = n(0),
        a = n(2),
        i = n(4);
    Object(r.combineWithMathJax)({ _: { components: { loader: o, package: a, startup: i } } });
    var u, c = ["[tex]/action", "[tex]/ams", "[tex]/ams_cd", "[tex]/bbox", "[tex]/boldsymbol", "[tex]/braket", "[tex]/bussproofs", "[tex]/cancel", "[tex]/color", "[tex]/configMacros", "[tex]/enclose", "[tex]/extpfeil", "[tex]/html", "[tex]/mhchem", "[tex]/newcommand", "[tex]/noerrors", "[tex]/noundefined", "[tex]/physics", "[tex]/require", "[tex]/unicode", "[tex]/verb"],
        s = { startup: ["loader"], "input/tex": ["input/tex-base", "[tex]/ams", "[tex]/newcommand", "[tex]/noundefined", "[tex]/require", "[tex]/autoload", "[tex]/configMacros"], "input/tex-full": ["input/tex-base", "[tex]/all-packages"].concat(c), "[tex]/all-packages": c };

    function l(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
        return r
    }
    Object(r.combineDefaults)(MathJax.config.loader, "dependencies", { "a11y/semantic-enrich": ["input/mml", "[sre]"], "a11y/complexity": ["a11y/semantic-enrich"], "a11y/explorer": ["a11y/semantic-enrich", "ui/menu"], "[tex]/all-packages": ["input/tex-base"], "[tex]/action": ["input/tex-base", "[tex]/newcommand"], "[tex]/autoload": ["input/tex-base", "[tex]/require"], "[tex]/ams": ["input/tex-base"], "[tex]/ams_cd": ["input/tex-base"], "[tex]/bbox": ["input/tex-base", "[tex]/ams", "[tex]/newcommand"], "[tex]/boldsymbol": ["input/tex-base"], "[tex]/braket": ["input/tex-base"], "[tex]/bussproofs": ["input/tex-base"], "[tex]/cancel": ["input/tex-base", "[tex]/enclose"], "[tex]/color": ["input/tex-base"], "[tex]/colorV2": ["input/tex-base"], "[tex]/configMacros": ["input/tex-base", "[tex]/newcommand"], "[tex]/enclose": ["input/tex-base"], "[tex]/extpfeil": ["input/tex-base", "[tex]/newcommand", "[tex]/ams"], "[tex]/html": ["input/tex-base"], "[tex]/mhchem": ["input/tex-base", "[tex]/ams"], "[tex]/newcommand": ["input/tex-base"], "[tex]/noerrors": ["input/tex-base"], "[tex]/noundefined": ["input/tex-base"], "[tex]/physics": ["input/tex-base"], "[tex]/require": ["input/tex-base"], "[tex]/tagFormat": ["input/tex-base"], "[tex]/unicode": ["input/tex-base"], "[tex]/verb": ["input/tex-base"] }), Object(r.combineDefaults)(MathJax.config.loader, "paths", { tex: "[mathjax]/input/tex/extensions", sre: "[mathjax]/sre/sre_browser" }), Object(r.combineDefaults)(MathJax.config.loader, "provides", s), o.Loader.preLoad("loader"), o.Loader.load.apply(o.Loader, function(e) { if (Array.isArray(e)) return l(e) }(u = o.CONFIG.load) || function(e) { if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e) }(u) || function(e, t) { if (e) { if ("string" == typeof e) return l(e, t); var n = Object.prototype.toString.call(e).slice(8, -1); return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(n) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? l(e, t) : void 0 } }(u) || function() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.") }()).then(function() { return o.CONFIG.ready() }).catch(function(e) { return o.CONFIG.failed(e) })
}]);