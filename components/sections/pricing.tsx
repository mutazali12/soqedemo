import { Check } from "lucide-react"
import { Button } from "@/components/ui/button"

const plans = [
  {
    name: "Starter",
    price: "$29",
    period: "per month",
    description: "Perfect for small businesses",
    features: ["Up to 1,000 products", "Basic analytics", "Email support", "Standard checkout", "Mobile responsive"],
    highlighted: false,
  },
  {
    name: "Professional",
    price: "$99",
    period: "per month",
    description: "For growing businesses",
    features: [
      "Unlimited products",
      "Advanced analytics",
      "Priority support",
      "Custom checkout",
      "API access",
      "Inventory management",
      "Multiple languages",
    ],
    highlighted: true,
  },
  {
    name: "Enterprise",
    price: "Custom",
    period: "contact us",
    description: "For large-scale operations",
    features: [
      "Everything in Professional",
      "Dedicated account manager",
      "Custom integrations",
      "White-label solution",
      "24/7 phone support",
      "Advanced security",
      "Custom development",
    ],
    highlighted: false,
  },
]

export function Pricing() {
  return (
    <section id="pricing" className="py-20 px-4 sm:px-6 lg:px-8 bg-card/30">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16 space-y-4">
          <h2 className="text-4xl sm:text-5xl font-bold text-foreground">Simple, Transparent Pricing</h2>
          <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
            Choose the perfect plan for your business. Scale up anytime.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {plans.map((plan, index) => (
            <div
              key={index}
              className={`rounded-2xl border transition-all duration-300 overflow-hidden ${
                plan.highlighted
                  ? "border-primary bg-card shadow-2xl scale-105"
                  : "border-border bg-background hover:border-border/50"
              }`}
            >
              {plan.highlighted && (
                <div className="bg-gradient-to-r from-primary to-accent px-4 py-2 text-center">
                  <span className="text-sm font-semibold text-primary-foreground">Most Popular</span>
                </div>
              )}

              <div className="p-8">
                <h3 className="text-xl font-bold text-foreground mb-2">{plan.name}</h3>
                <p className="text-muted-foreground text-sm mb-6">{plan.description}</p>

                <div className="mb-8">
                  <span className="text-4xl font-bold text-foreground">{plan.price}</span>
                  <span className="text-muted-foreground ml-2">{plan.period}</span>
                </div>

                <Button
                  className={`w-full mb-8 py-6 ${
                    plan.highlighted
                      ? "bg-primary hover:bg-primary/90 text-primary-foreground"
                      : "border border-border bg-background hover:bg-card text-foreground"
                  }`}
                  variant={plan.highlighted ? "default" : "outline"}
                >
                  Get Started
                </Button>

                <div className="space-y-4">
                  {plan.features.map((feature, i) => (
                    <div key={i} className="flex items-start gap-3">
                      <Check className="w-5 h-5 text-accent flex-shrink-0 mt-0.5" />
                      <span className="text-sm text-muted-foreground">{feature}</span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
