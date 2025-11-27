"use client"

import { useState } from "react"
import { Menu, X, ShoppingCart } from "lucide-react"
import { Button } from "@/components/ui/button"

export function Header() {
  const [isOpen, setIsOpen] = useState(false)

  return (
    <header className="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-sm border-b border-border">
      <nav className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
        <div className="flex items-center gap-2">
          <div className="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-accent flex items-center justify-center">
            <ShoppingCart className="w-5 h-5 text-white" />
          </div>
          <span className="font-bold text-xl text-foreground">StorePro</span>
        </div>

        <div className="hidden md:flex items-center gap-8">
          <a href="#features" className="text-sm text-muted-foreground hover:text-foreground transition">
            Features
          </a>
          <a href="#products" className="text-sm text-muted-foreground hover:text-foreground transition">
            Products
          </a>
          <a href="#pricing" className="text-sm text-muted-foreground hover:text-foreground transition">
            Pricing
          </a>
          <Button className="bg-primary hover:bg-primary/90 text-primary-foreground">Get Started</Button>
        </div>

        <button onClick={() => setIsOpen(!isOpen)} className="md:hidden p-2 hover:bg-card rounded-lg transition">
          {isOpen ? <X /> : <Menu />}
        </button>
      </nav>

      {isOpen && (
        <div className="md:hidden border-t border-border">
          <div className="px-4 py-4 space-y-4">
            <a href="#features" className="block text-sm text-muted-foreground hover:text-foreground">
              Features
            </a>
            <a href="#products" className="block text-sm text-muted-foreground hover:text-foreground">
              Products
            </a>
            <a href="#pricing" className="block text-sm text-muted-foreground hover:text-foreground">
              Pricing
            </a>
            <Button className="w-full bg-primary hover:bg-primary/90 text-primary-foreground">Get Started</Button>
          </div>
        </div>
      )}
    </header>
  )
}
