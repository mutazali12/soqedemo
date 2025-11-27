import { Button } from "@/components/ui/button"
import { ArrowRight, Sparkles } from "lucide-react"

export function Hero() {
  return (
    <section className="pt-32 pb-20 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div className="space-y-8">
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-card border border-border">
              <Sparkles className="w-4 h-4 text-primary" />
              <span className="text-sm text-muted-foreground">Next-gen e-commerce platform</span>
            </div>

            <div className="space-y-4">
              <h1 className="text-5xl sm:text-6xl font-bold tracking-tight text-foreground">
                Build Your Digital
                <span className="block text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">
                  Storefront
                </span>
              </h1>
              <p className="text-xl text-muted-foreground max-w-xl leading-relaxed">
                A powerful, modern e-commerce platform with intuitive product management, intelligent cart system, and
                seamless checkout experience.
              </p>
            </div>

            <div className="flex flex-col sm:flex-row gap-4">
              <Button className="bg-primary hover:bg-primary/90 text-primary-foreground text-base py-6 px-8 flex items-center gap-2">
                Start Free Trial <ArrowRight className="w-4 h-4" />
              </Button>
              <Button
                variant="outline"
                className="border-border text-foreground hover:bg-card text-base py-6 px-8 bg-transparent"
              >
                Watch Demo
              </Button>
            </div>

            <div className="flex items-center gap-8 pt-8 border-t border-border">
              <div className="space-y-1">
                <p className="text-2xl font-bold text-foreground">500+</p>
                <p className="text-sm text-muted-foreground">Active Stores</p>
              </div>
              <div className="space-y-1">
                <p className="text-2xl font-bold text-foreground">$2M+</p>
                <p className="text-sm text-muted-foreground">GMV Processed</p>
              </div>
              <div className="space-y-1">
                <p className="text-2xl font-bold text-foreground">99.9%</p>
                <p className="text-sm text-muted-foreground">Uptime SLA</p>
              </div>
            </div>
          </div>

          <div className="relative">
            <div className="absolute inset-0 bg-gradient-to-r from-primary/20 to-accent/20 blur-3xl rounded-full"></div>
            <img
              src="/modern-ecommerce-dashboard.jpg"
              alt="E-commerce dashboard"
              className="relative rounded-2xl border border-border shadow-2xl"
            />
          </div>
        </div>
      </div>
    </section>
  )
}
