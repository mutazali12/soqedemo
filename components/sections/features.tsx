import { Zap, Globe, Lock, BarChart3, Smartphone, Trello } from "lucide-react"

const features = [
  {
    icon: Zap,
    title: "Lightning Fast",
    description: "Optimized performance with sub-100ms load times and instant checkout experience",
  },
  {
    icon: Globe,
    title: "Multilingual",
    description: "Built-in support for Arabic, English, and 20+ languages for global reach",
  },
  {
    icon: Lock,
    title: "Enterprise Security",
    description: "Bank-level encryption, PCI compliance, and advanced fraud detection",
  },
  {
    icon: BarChart3,
    title: "Analytics Dashboard",
    description: "Real-time insights into sales, inventory, and customer behavior",
  },
  {
    icon: Smartphone,
    title: "Mobile Optimized",
    description: "Fully responsive design that works seamlessly on all devices",
  },
  {
    icon: Trello,
    title: "Inventory Management",
    description: "Automated stock tracking, low-stock alerts, and smart reordering",
  },
]

export function Features() {
  return (
    <section id="features" className="py-20 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16 space-y-4">
          <h2 className="text-4xl sm:text-5xl font-bold text-foreground">Powerful Features</h2>
          <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
            Everything you need to run a successful e-commerce business
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {features.map((feature, index) => {
            const Icon = feature.icon
            return (
              <div
                key={index}
                className="group p-6 rounded-xl border border-border bg-card/50 hover:bg-card hover:border-primary/30 transition-all duration-300"
              >
                <div className="mb-4 w-12 h-12 rounded-lg bg-gradient-to-br from-primary/20 to-accent/20 flex items-center justify-center group-hover:from-primary/30 group-hover:to-accent/30 transition">
                  <Icon className="w-6 h-6 text-primary" />
                </div>
                <h3 className="text-lg font-semibold text-foreground mb-2">{feature.title}</h3>
                <p className="text-muted-foreground leading-relaxed">{feature.description}</p>
              </div>
            )
          })}
        </div>
      </div>
    </section>
  )
}
