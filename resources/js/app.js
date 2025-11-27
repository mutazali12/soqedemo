import "./bootstrap"
import Alpine from "alpinejs"

Alpine.start()

// Global config
window.app = {
  locale: document.documentElement.lang,
  csrf: document.querySelector('meta[name="csrf-token"]').content,
}

// Helper functions
window.formatCurrency = (amount) => {
  return new Intl.NumberFormat("ar-SA", {
    style: "currency",
    currency: "SAR",
  }).format(amount)
}

window.notify = (message, type = "info") => {
  const alertDiv = document.createElement("div")
  alertDiv.className = `alert alert-${type} alert-dismissible fade show`
  alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `
  document.querySelector("main")?.insertAdjacentElement("beforebegin", alertDiv)
}
