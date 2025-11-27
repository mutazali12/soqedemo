import { Button } from "@/components/ui/button"
import { ArrowRight } from "lucide-react"

export function CTA() {
  return (
    <section className="py-20 px-4 sm:px-6 lg:px-8">
      <div className="max-w-4xl mx-auto">
        <div className="relative rounded-2xl border border-border bg-gradient-to-br from-card to-card/50 overflow-hidden">
          <div className="absolute inset-0 bg-gradient-to-r from-primary/10 to-accent/10 opacity-50"></div>

          <div className="relative p-12 md:p-16 text-center space-y-6">
            <h2 className="text-4xl sm:text-5xl font-bold text-foreground">Ready to Launch Your Store?</h2>
            <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
              Join 500+ successful businesses already using our platform. Start your free trial today with no credit
              card required.
            </p>

            <div className="flex flex-col sm:flex-row gap-4 justify-center pt-4">
              <Button className="bg-primary hover:bg-primary/90 text-primary-foreground text-base py-6 px-8 flex items-center justify-center gap-2">
                Start Free Trial <ArrowRight className="w-4 h-4" />
              </Button>
              <Button
                variant="outline"
                className="border-border text-foreground hover:bg-card text-base py-6 px-8 bg-transparent"
              >
                Schedule Demo
              </Button>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
