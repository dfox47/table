export interface Holder {
  position: 'both' | 'left' | "right";
  price: number;
  value: boolean;
}

export interface Product {
  bottomColor?: string;
  deskLegs?: boolean;
  ventHoles?: boolean;
  mainColor?: string;
  phoneHolder?: Holder;
  tabletHolder?: Holder;
  whiteboard?: Holder;
}