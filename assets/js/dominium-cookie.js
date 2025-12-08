const dominiumCookie = () => {
  const cookieModal = document.querySelector(".js-cookie-dominium");
  if (!cookieModal) return;

  const [acceptAllBtn, acceptNecessaryBtn] = cookieModal.querySelectorAll(
    ".cookie__content__buttons .button_link"
  );

  // Set cookie
  const setCookie = (name, value, days) => {
    const expires = new Date(
      Date.now() + days * 24 * 60 * 60 * 1000
    ).toUTCString();
    document.cookie = `${name}=${value}; expires=${expires}; path=/`;
  };

  const getCookie = (name) => {
    const match = document.cookie.match(
      new RegExp("(^| )" + name + "=([^;]+)")
    );
    return match ? match[2] : null;
  };

  const cookieConsent = getCookie("cookie_consent");
  cookieModal.style.display = cookieConsent ? "none" : "block";

  // Accept all cookies
  acceptAllBtn.addEventListener("click", () => {
    setCookie("cookie_consent", "all", 365);
    cookieModal.style.display = "none";
    dominiumEnableBlockedIframes();
  });

  // Accept only necessary
  acceptNecessaryBtn.addEventListener("click", () => {
    setCookie("cookie_consent", "necessary", 365);
    cookieModal.style.display = "none";
  });

  // Show cookie modal when clicking the button
  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("js-show-cookie-modal")) {
      cookieModal.style.display = "block";
    }
  });
};

// Block iframes with consent system
const dominiumBlockIframes = () => {
  const consentAll = document.cookie.includes("cookie_consent=all");
  const blockedDomains = window.dominiumCookieData?.blockedDomains || [];
  const placeholderTemplate =
    window.dominiumCookieData?.iframePlaceholder || "";

  if (consentAll || blockedDomains.length === 0) {
    return;
  }

  const iframes = document.querySelectorAll("iframe");

  iframes.forEach((iframe) => {
    const src = iframe.getAttribute("src") || "";
    const matchedDomain = blockedDomains.find((domain) => src.includes(domain));

    if (matchedDomain) {
      const domainName = domainFromSrc(src);
      const placeholder = document.createElement("div");
      placeholder.className = "iframe-placeholder";

      placeholder.setAttribute("data-iframe-html", iframe.outerHTML);
      placeholder.setAttribute("data-iframe-src", src);

      const html = placeholderTemplate.replace(/{{DOMAIN}}/g, domainName);
      placeholder.innerHTML = html;

      iframe.parentNode.replaceChild(placeholder, iframe);
    }
  });

  function domainFromSrc(src) {
    try {
      return new URL(src).hostname.replace("www.", "");
    } catch {
      return src;
    }
  }
};

// Restore blocked iframes after consent
const dominiumEnableBlockedIframes = () => {
  const placeholders = document.querySelectorAll(
    ".iframe-placeholder[data-iframe-html]"
  );

  placeholders.forEach((ph) => {
    const iframeHtml = ph.getAttribute("data-iframe-html");
    if (iframeHtml) {
      ph.outerHTML = iframeHtml;
    }
  });

  // Return google maps
  const mapContainer = document.querySelector(".map.map--empty");
  if (mapContainer) {
    const mapPlaceholder = mapContainer.querySelector(
      ".js-cookie-placecholder-dominium"
    );

    let iframeHtml = mapPlaceholder?.getAttribute("data-iframe-html");

    if (!iframeHtml) {
      const src = mapPlaceholder?.getAttribute("data-iframe-src");
      if (src) {
        iframeHtml = `<iframe src="${src}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;
      }
    }

    if (iframeHtml) {
      mapContainer.innerHTML = iframeHtml;
      mapContainer.classList.remove("map--empty");
    }
  }
};

// Init
const initCookieDominium = () => {
  dominiumCookie();
  dominiumBlockIframes();
};

initCookieDominium();
