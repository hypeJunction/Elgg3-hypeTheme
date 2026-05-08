<a name="4.0.0"></a>
# 4.0.0 (2026-05-08)

### Breaking Changes

* **elgg:** raise minimum to Elgg 4.x (PHP 8.1+). Plugins on Elgg 3.x must stay on hypetheme 1.x.

### Bug Fixes

* **SetThemeVars:** use PHP 8.0 nullsafe operator `?->` when accessing font value props (null when no setting saved)
* **SetThemeVars:** fix typo `'defualt'` → `'default'` in font-weight fallback
* **elgg-plugin.php:** add missing trailing newline (phpcs)

### Migration (1.x → 4.x)

* **docker:** stack updated to `php:8.1-apache`, `mysql:5.7`, `elgg/elgg 4.3.6`.
* **ci:** added `.github/workflows/tests.yml` and `lint.yml`.

### Dependency Updates

* `elgg/elgg ^4.0`, PHP `>=8.1`, version bumped to `4.0.0`

---

<a name="1.1.2"></a>
## [1.1.2](https://github.com/hypeJunction/Elgg3-hypeTheme/compare/1.1.1...1.1.2) (2019-07-08)


### Bug Fixes

* **nav:** add a way to disable page menu ([6acc458](https://github.com/hypeJunction/Elgg3-hypeTheme/commit/6acc458))



<a name="1.1.1"></a>
## [1.1.1](https://github.com/hypeJunction/Elgg3-hypeTheme/compare/1.1.0...1.1.1) (2019-06-20)


### Bug Fixes

* **releases:** use correct github URL ([7756eda](https://github.com/hypeJunction/Elgg3-hypeTheme/commit/7756eda))



<a name="1.1.0"></a>
# [1.1.0](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/compare/1.0.3...1.1.0) (2019-06-20)


### Bug Fixes

* **warning:** create an assets dir when plugin activated ([37a87e3](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/37a87e3))


### Features

* **landing:** move landing page editor into its own plugin ([a33b046](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/a33b046))



<a name="1.0.3"></a>
## [1.0.3](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/compare/1.0.2...1.0.3) (2018-07-09)


### Bug Fixes

* **menus:** reduce alt icon size in size menu ([59f9efa](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/59f9efa))



<a name="1.0.2"></a>
## [1.0.2](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/compare/1.0.1...1.0.2) (2018-07-08)


### Bug Fixes

* **docs:** add credits for used graphics ([c71ffdb](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/c71ffdb))
* **theme:** fix landing responsiveness ([a6f3f5b](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/a6f3f5b))


### Features

* **account:** restyle account forms and pages ([dd692b3](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/dd692b3))



<a name="1.0.1"></a>
## [1.0.1](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/compare/1.0.0...1.0.1) (2018-07-04)


### Bug Fixes

* **composer:** fix composer namespace ([942387a](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/942387a))



<a name="1.0.0"></a>
# 1.0.0 (2018-07-04)


### Features

* **releases:** initial commit ([5e53cc9](https://github.com/hypeJunctionPro/Elgg3-hypeTheme/commit/5e53cc9))



