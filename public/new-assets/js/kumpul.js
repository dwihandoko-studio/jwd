var Admin = Admin || {};

if (!Admin.view) { Admin.view = {} }
if (!Admin.view._components) { Admin.view._components = {} }

var Peta = Peta || {};
if (!Peta.global) { Peta.global = {} }
(Ext.cmd.derive("Admin.view._components.LeafletMap", Ext.panel.Panel, {
    referenceHolder: true,
    config: { baseCls: "x-leafletmap", useLocation: false, map: null, mapOptions: { zoom: 12 }, lintang: -6.2254649, bujur: 106.8020575, tileLayers: [], tileLayerOptions: { tileLayerUrl: "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", attribution: '&copy; <a href="http://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a>, &copy; <a href="http://dapo.kemdikbud.go.id" target="_blank">DAPODIK</a>' }, autoCenter: false, initialCenter: true, locationMarker: { iconUrl: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo5MzU1NTA1QkVCOEJFMTExOURCNTg1MjVEMTZGRkZFNSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo4QjhBOThCNjhCRUMxMUUxQjI0RUVFOTMxQkJCQjcxQyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo4QjhBOThCNThCRUMxMUUxQjI0RUVFOTMxQkJCQjcxQyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1LjEgV2luZG93cyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjkzNTU1MDVCRUI4QkUxMTE5REI1ODUyNUQxNkZGRkU1IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjkzNTU1MDVCRUI4QkUxMTE5REI1ODUyNUQxNkZGRkU1Ii8+IDwvcmRmOkRlc2NyaXB0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", iconSize: [20, 20], iconAnchor: [20 / 2, 20 / 2] } },
    constructor: function() { Ext.panel.Panel.prototype.constructor.apply(this, arguments); if (!window.L) { this.setHtml("Unable to render Leaflet map without Leaflet library") } else {} },
    onBoxReady: function() {
        Ext.panel.Panel.prototype.onBoxReady.apply(this, arguments);
        this.renderMap()
    },
    onTouchStart: function(b) { b.makeUnpreventable() },
    applyMapOptions: function(b) { return Ext.merge({}, this.options, b) },
    updateMapOptions: function(g) { var d = window.L; var e = this.getMap(); if (d && e) { e.setOptions(g) } },
    getMapOptions: function() { return Ext.merge({}, this.options || this.getInitialConfig("mapOptions")) },
    updateUseLocation: function(c) { var d = this; if (c) { this._locationWatcher = navigator.geolocation.watchPosition(function(a) { d.onGeoUpdate(a) }) } else { if (!c && this._locationWatcher) { navigator.geolocation.clearWatch(this._locationWatcher) } } },
    doResize: function() {
        var c = window.L,
            d = this.getMap();
        if (c && d) { d.invalidateSize() }
    },
    renderMap: function() {
        var o = this,
            n = window.L,
            q = o.body,
            t = o.getMapOptions(),
            u;
        if (n && !q.dom._leaflet) {
            if (!t.hasOwnProperty("center")) {
                var p = this.getInitialConfig("lintang");
                var s = this.getInitialConfig("bujur");
                t.center = new n.LatLng(p, s)
            }
            if (t.center && t.center.lat && t.center.lng) { t.center = new n.LatLng(t.center.lat, t.center.lng) }
            var r = o.getTileLayers() || [];
            var m = o.getTileLayerOptions();
            if (r.length > 0) {} else { if (!!m.retinaTileLayerUrl && n.Browser.retina) { r.unshift(new n.TileLayer(m.retinaTileLayerUrl, m)) } else { if (!!m.tileLayerUrl) { r.unshift(new n.TileLayer(m.tileLayerUrl, m)) } } }
            o.setTileLayers(r);
            t.layers = r;
            o.setMap(new n.Map(q.dom, t));
            u = o.getMap();
            if (u) {
                Peta.global.Vars.lastMarker = n.marker([t.center.lat, t.center.lng]).addTo(u);
                n.Control.geocoder().addTo(u)
            }
            if (Ext.supports.Geolocation && o.getUseLocation()) { o.addLocationMarker() } else { this.setHtml("Geolocation is not supported by this browser.") }
            u.on("zoomend", o.onZoomEnd, o);
            u.on("movestart", o.onMoveStart, o);
            u.on("moveend", o.onMoveEnd, o);
            u.on("click", o.onClick, o);
            o.fireEvent("maprender", o, u, r)
        }
    },
    onGeoUpdate: function(e) {
        var g = window.L,
            d = this._positionMarker;
        if (g && e && (this.getAutoCenter() || this.getInitialCenter())) {
            this.setMapCenter(new g.LatLng(e.coords.latitude, e.coords.longitude));
            this.setInitialCenter(false)
        }
        if (d) { d.setLatLng(g.latLng(e.coords.latitude, e.coords.longitude)) }
    },
    setMapCenter: function(l) {
        var h = this,
            n = h.getMap(),
            o = window.L;
        if (o) {
            var k = this.getInitialConfig("lintang");
            var m = this.getInitialConfig("bujur");
            l = l || new o.LatLng(k, m);
            if (l && !(l instanceof o.LatLng) && l.hasOwnProperty("latitude")) { l = new o.LatLng(l.latitude, l.longitude) }
            if (n && l instanceof o.LatLng) { n.panTo(l) } else { this.options = Ext.apply(this.getMapOptions(), { center: l }) }
        }
    },
    addLocationMarker: function() {
        var m = this,
            l = window.L,
            o, n, h, k;
        n = Ext.merge({}, m.getLocationMarker());
        o = l.icon(n);
        k = Ext.merge({ icon: o }, m.getLocationMarker());
        navigator.geolocation.getCurrentPosition(function(a) {
            h = l.marker([a.coords.latitude, a.coords.longitude], k);
            m._positionMarker = h;
            h.addTo(m.getMap())
        })
    },
    onZoomEnd: function() {
        var g = this.getMapOptions(),
            k = this.getMap(),
            h = this.getTileLayers(),
            e;
        e = k.getZoom() || 10;
        this.options = Ext.apply(g, { zoom: e });
        this.fireEvent("zoomend", this, k, h, e)
    },
    onMoveStart: function() {
        var d = this.getMap(),
            c = this.getTileLayers();
        this.fireEvent("movestart", this, d, c)
    },
    onMoveEnd: function() {
        var d = this.getMap(),
            c = this.getTileLayers();
        this.fireEvent("moveend", this, d, c)
    },
    onClick: function(o) {
        var p = this.getMap(),
            m = this.getTileLayers(),
            q = window.L;
        var n = o.latlng;
        if (n) {
            var e = n.lat;
            var l = n.lng;
            this.fireEvent("click", this, p, m);
            if (Peta.global.Vars.lastMarker != undefined) { p.removeLayer(Peta.global.Vars.lastMarker) }
            Peta.global.Vars.lastMarker = q.marker([e, l]).addTo(p)
        }
    },
    destroy: function() {
        var c = this.getMap(),
            d = this.getTileLayers();
        if (c) {
            c.remove();
            c = null
        }
        if (d) { d = null }
        Ext.panel.Panel.prototype.destroy.call(this)
    }
}, 1, ["leafletmap"], ["component", "box", "container", "panel", "leafletmap"], { component: true, box: true, container: true, panel: true, leafletmap: true }, ["widget.leafletmap"], 0, [Admin.view._components, "LeafletMap"], 0));
(Ext.cmd.derive("Admin.view._components.PetaWindow", Ext.window.Window, {
    layout: { type: "fit" },
    title: "Peta Koordinat",
    width: 900,
    height: 500,
    modal: true,
    closeAction: "destroy",
    initComponent: function() {
        var g = parseFloat(this.initialConfig.lintang);
        var h = parseFloat(this.initialConfig.bujur);
        var k = this.initialConfig.nama;
        var e = this.initialConfig.cari_lokasi;
        if (g && h) {
            if (g == 0 && h == 0) {
                g = -6.2254649;
                h = 106.8020575;
                k = "Kementerian Pendidikan dan Kebudayaan, Jakarta"
            }
        } else {
            g = -6.2254649;
            h = 106.8020575;
            k = "Kementerian Pendidikan dan Kebudayaan, Jakarta"
        }
        this.items = [{ xtype: "leafletmap", itemId: "map1", useLocation: true, autoCenter: true, enableOwnPositionMarker: false, lintang: g, bujur: h, mapOptions: { zoom: 14 } }];
        this.dockedItems = [{
            xtype: "toolbar",
            dock: "top",
            items: [{
                xtype: "displayfield",
                name: "cari_lokasi",
                fieldLabel: "Alamat",
                value: e,
                width: 600,
                enableKeyEvents: true,
                labelAlign: "right",
                listeners: {
                    keypress: function(b, c) {
                        var d = b.getValue();
                        var a = b.up("toolbar").up("window").down("gmappanel");
                        var n = d.length;
                        if (c.getKey() == c.ENTER) {
                            if (n < 1) { Xond.msg("Cari", "Mereset Pencarian Lokasi") } else {
                                Xond.msg("Cari", "Mncari lokasi dengan kata kunci <b>" + d + "</b> ...");
                                a.lookupCode(d)
                            }
                        }
                    }
                }
            }, "-", { text: "Pilih Koordinat", ui: "soft-blue", iconCls: "fa fa-check", itemId: "pilihKoordinat" }, {
                text: "Tutup",
                ui: "soft-red",
                iconCls: "fa fa-close",
                handler: function(b) {
                    var a = b.up("petawindow");
                    a.hide()
                }
            }]
        }];
        this.tools = [{
            type: "maximize",
            handler: function(b, a, d, c) {
                win = c.up("window");
                win.toggleMaximize();
                var c = win.down("tool[type=minimize]");
                c.show()
            }
        }, {
            type: "minimize",
            handler: function(b, a, d, c) {
                win = c.up("window");
                win.toggleMaximize();
                var c = win.down("tool[type=minimize]");
                c.hide()
            }
        }];
        Ext.window.Window.prototype.initComponent.apply(this, arguments)
    }
}, 0, ["petawindow"], ["component", "box", "container", "panel", "window", "petawindow"], { component: true, box: true, container: true, panel: true, window: true, petawindow: true }, ["widget.petawindow"], 0, [Admin.view._components, "PetaWindow"], 0));
(Ext.cmd.derive("Admin.view._components.PetaWindowGMaps", Ext.window.Window, {
    layout: { type: "border" },
    title: "Peta Koordinat",
    width: 900,
    height: 500,
    modal: true,
    closeAction: "destroy",
    initComponent: function() {
        var g = parseFloat(this.initialConfig.lintang);
        var h = parseFloat(this.initialConfig.bujur);
        var k = this.initialConfig.nama;
        var e = this.initialConfig.cari_lokasi;
        if (g && h) {
            if (g == 0 && h == 0) {
                g = -6.2254649;
                h = 106.8020575;
                k = "Kementerian Pendidikan dan Kebudayaan, Jakarta"
            }
        } else {
            g = -6.2254649;
            h = 106.8020575;
            k = "Kementerian Pendidikan dan Kebudayaan, Jakarta"
        }
        this.items = [{ xtype: "gmappanel", id: "mygooglemap", region: "center", center: { geoCodeAddr: g + "," + h, marker: { title: k, listeners: { click: function(a) { Ext.Msg.alert(k, "Lintang: " + g + "<br> Bujur: " + h) } } } }, listeners: { click: function(a) { Xond.msg("yes", "You clicked the map.") } } }, { xtype: "form", itemId: "formsetkoordinat", title: "Koordinat Lintang & Bujur", bodyPadding: 5, region: "east", width: 350, split: true, collapsible: true, minWidth: 150, dockedItems: [{ xtype: "toolbar", dock: "top", items: [{ xtype: "button", text: "Pilih Koordinat", ui: "soft-blue", iconCls: "fa fa-check", itemId: "pilihKoordinat" }, { xtype: "button", text: "Simpan & Tutup Jendela", ui: "soft-red", iconCls: "fa fa-check", itemId: "saveKoordinatTutup" }] }], defaults: { anchor: "100%", labelAlign: "top" }, defaultType: "textfield", items: [{ xtype: "displayfield", fieldLabel: "Lintang", name: "lintang", itemId: "lintang", value: g, allowBlank: true, renderer: function(a) { return "<b>" + a + "</b>" } }, { xtype: "displayfield", fieldLabel: "Bujur", name: "bujur", itemId: "bujur", value: h, allowBlank: true, renderer: function(a) { return "<b>" + a + "</b>" } }] }];
        this.dockedItems = [{
            xtype: "toolbar",
            dock: "top",
            items: ["-", {
                xtype: "textfield",
                flex: 1,
                name: "cari_lokasi",
                fieldLabel: "Cari Lokasi",
                value: e,
                enableKeyEvents: true,
                labelAlign: "right",
                listeners: {
                    keypress: function(b, c) {
                        var d = b.getValue();
                        var a = b.up("toolbar").up("window").down("gmappanel");
                        var n = d.length;
                        if (c.getKey() == c.ENTER) {
                            if (n < 1) { Xond.msg("Cari", "Mereset Pencarian Lokasi") } else {
                                Xond.msg("Cari", "Mncari lokasi dengan kata kunci <b>" + d + "</b> ...");
                                a.lookupCode(d)
                            }
                        }
                    }
                }
            }]
        }];
        this.tools = [{
            type: "maximize",
            handler: function(b, a, d, c) {
                win = c.up("window");
                win.toggleMaximize();
                var c = win.down("tool[type=minimize]");
                c.show()
            }
        }, {
            type: "minimize",
            handler: function(b, a, d, c) {
                win = c.up("window");
                win.toggleMaximize();
                var c = win.down("tool[type=minimize]");
                c.hide()
            }
        }];
        Ext.window.Window.prototype.initComponent.apply(this, arguments)
    }
}, 0, ["petawindowgmaps"], ["component", "box", "container", "panel", "window", "petawindowgmaps"], { component: true, box: true, container: true, panel: true, window: true, petawindowgmaps: true }, ["widget.petawindowgmaps"], 0, [Admin.view._components, "PetaWindowGMaps"], 0));

(Ext.cmd.derive("Peta.global.Vars", Ext.Base, { singleton: true, lastMarker: undefined }, 0, 0, 0, 0, 0, 0, [Peta.global, "Vars"], 0));