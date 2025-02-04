export interface Holder {
  position: 'both' | 'left';
  price: number;
  value: boolean;
}

export interface Product {
  bottomColor?: string;
  mainColor?: string;
  phoneHolder?: Holder;
  tabletHolder?: Holder;
  ventHoles?: Holder;
  whiteboard?: Holder;
}