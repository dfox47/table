export interface Holder {
  position: 'both' | 'left' | "right";
  price: number;
  value: boolean;
}

export interface Product {
  bottomColor?: string;
  deskLegs?: Holder;
  mainColor?: string;
  phoneHolder?: Holder;
  tabletHolder?: Holder;
  ventHoles?: Holder;
  whiteboard?: Holder;
}