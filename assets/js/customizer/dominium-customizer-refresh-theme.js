const customizerRefershTheme = () => {
  if (typeof wp === "undefined" || !wp.customize) {
    return;
  }

  wp.customize("dominium_selected_theme", function (value) {
    value.bind(function (newTheme) {
      document.body.classList.forEach(function (cls) {
        if (cls.startsWith("theme-")) {
          document.body.classList.remove(cls);
        }
      });
      document.body.classList.add("theme-" + newTheme);
    });
  });
};

wp.customize.bind("preview-ready", () => {
  customizerRefershTheme();
});
